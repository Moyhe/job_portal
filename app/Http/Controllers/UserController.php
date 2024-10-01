<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    const JOB_SEEKER = 'seeker';
    const JOB_POSTER = 'employer';

    public function createSeeker()
    {
        return view('user.seeker-register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createEmployer()
    {
        return view('user.employer-register');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function storeEmployer(RegistrationFormRequest $request)
    {
        /** @var User $user */

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type' => self::JOB_POSTER,
            'user_trial' => now()->addWeek()
        ]);

        Auth::login($user);

        $user->sendEmailVerificationNotification();

        return redirect()->route('verification.notice')->with('successMessage', 'Your account was created');
    }


    public function storeSeeker(RegistrationFormRequest $request)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type' => self::JOB_SEEKER
        ]);

        Auth::login($user);

        $user->sendEmailVerificationNotification();

        return redirect()->route('verification.notice')->with('successMessage', 'Your account was created');
    }


    public function login()
    {
        return view('user.login');
    }


    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        $credentails = $request->only('email', 'password');

        if (Auth::attempt($credentails)) {

            session()->regenerate();

            if (!auth()->user()->email_verified_at) {
                return redirect()->to('/verify');
            }
            if (auth()->user()->user_type == 'employer') {
                return redirect()->to('dashboard');
            } else {

                return redirect()->to('/');
            }
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->to('/');
    }



    public function seekerProfile()
    {

        return view('seeker.profile');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect');
        }

        /** @var User $user */
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Your password has been updated successfully');
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([

            'profile_pic' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($attributes['profile_pic'] ?? false) {
            $attributes['profile_pic'] = request()->file('profile_pic')->store('profile');
        }

        User::query()->find(auth()->user()->id)->update($attributes);

        return back()->with('success', 'Your profile has been updated');
    }

    public function uploadResume(Request $request)
    {
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('resume')) {
            $resume = $request->file('resume')->store('resume');
            User::find(auth()->user()->id)->update(['resume' => $resume]);

            return back()->with('success', 'Your resume has been updated successfully');
        }
    }

    public function jobApplied()
    {
        $header = 'Job Applications';

        $users =  User::with('listings')->where('id', auth()->user()->id)->paginate(4);

        return view('seeker.job-applied', compact('users', 'header'));
    }
}
