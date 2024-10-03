<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact', [
            'header' => 'Contact'
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'fname' => ['required', 'string'],
            'lname' => ['required', 'string'],
            'email' => ['email', 'required'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'string']
        ]);

        try {
            Mail::to('mohyemahmoud123@gmail.com')
                ->send(new ContactMail($validated['fname'], $validated['lname'], $validated['message']));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

        return response()->json([
            'message' => 'thanks for you we will contact you soon'
        ]);
    }
}
