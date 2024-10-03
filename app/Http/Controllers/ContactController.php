<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $request->validate([
            'fname' => ['required', 'string'],
            'lname' => ['required', 'string'],
            'email' => ['email', 'required'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'string']
        ]);

        return response()->json([
            'message' => 'thanks for you we will contact you soon'
        ]);
    }
}
