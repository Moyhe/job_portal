<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::latest()->withCount('users')->where('user_id', auth()->user()->id)->first();

        return view('dashboard', compact('listings'));
    }

    public function verify()
    {
        return view('user.verify');
    }

    public function resend()
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('home')->with('success', 'Your email was verified');
        }

        $user->sendEmailVerificationNotification();

        return back()->with('success', 'Verfication link sent successfully');
    }
}
