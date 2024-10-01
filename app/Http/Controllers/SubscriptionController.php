<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminRoute;
use App\Http\Middleware\doNotAllowUserToMakePayment;
use App\Http\Middleware\isEmployer;
use App\Mail\PurchaseMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class SubscriptionController extends Controller
{

    const WEEKLY_AMOUNT = 20;
    const MONTHLY_AMOUNT = 80;
    const YEARLY_AMOUNT = 200;
    const CURRENCY = 'USD';


    public function __construct()
    {
        $this->middleware([AdminRoute::class, isEmployer::class]);
        $this->middleware([AdminRoute::class, doNotAllowUserToMakePayment::class])->except('subscribe');
    }

    /**
     * Display a listing of the resource.
     */
    public function subscribe()
    {
        return view('subscription.index');
    }

    public function initiatePayment(Request $request)
    {
        $plans = [
            'weekly' => [
                'name' => 'weekly',
                'description' => 'weekly payment',
                'amount' => self::WEEKLY_AMOUNT,
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
            'monthly' => [
                'name' => 'monthly',
                'description' => 'monthly payment',
                'amount' => self::MONTHLY_AMOUNT,
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
            'yearly' => [
                'name' => 'yearly',
                'description' => 'yearly payment',
                'amount' => self::YEARLY_AMOUNT,
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
        ];

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $selectPlan = null;
            $billingEnds = null;

            // Debug request path
            Log::info('Request path: ' . $request->path());

            if ($request->routeIs('pay.weekly')) {
                $selectPlan = $plans['weekly'];
                $billingEnds = now()->addWeek()->startOfDay()->toDateString();
            } elseif ($request->routeIs('pay.monthly')) {
                $selectPlan = $plans['monthly'];
                $billingEnds = now()->addMonth()->startOfDay()->toDateString();
            } elseif ($request->routeIs('pay.yearly')) {
                $selectPlan = $plans['yearly'];
                $billingEnds = now()->addYear()->startOfDay()->toDateString();
            }


            // Log selected plan
            if ($selectPlan) {
                Log::info('Selected plan: ' . $selectPlan['name']);

                $successURl = URL::signedRoute('payment.success', [
                    'plan' => $selectPlan['name'],
                    'billing_ends' => $billingEnds
                ]);

                $session = Session::create([
                    'line_items' => [[
                        'price_data' => [
                            'currency' => $selectPlan['currency'],
                            'unit_amount' => $selectPlan['amount'] * 100, // Stripe expects amount in cents
                            'product_data' => [
                                'name' => $selectPlan['name'],
                                'description' => $selectPlan['description'],
                            ],
                        ],
                        'quantity' => $selectPlan['quantity'],
                    ]],
                    'mode' => 'payment',
                    'success_url' => $successURl,
                    'cancel_url' => route('payment.cancel'),
                ]);

                Log::info('Session URL: ' . $session->url);

                return redirect($session->url);
            } else {
                // Log no plan selected
                Log::warning('No plan selected.');
                return response()->json(['error' => 'No plan selected.'], 400);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function paymentSuccess(Request $request)
    {
        $plan = $request->plan;
        $billingEnds = $request->billing_ends;
        User::where('id', auth()->user()->id)->update([
            'plan' => $plan,
            'billing_ends' => $billingEnds,
            'status' => 'paid'
        ]);

        try {
            Mail::to(auth()->user())->queue(new PurchaseMail($plan, $billingEnds));
        } catch (\Exception $e) {
            return response()->json($e);
        }


        return redirect()->route('dashboard')->with('success', 'Payment was successfully processed');
    }

    public function cancel()
    {
        return redirect()->route('dashboard')->with('error', 'Payment was unsuccessful!');
    }
}
