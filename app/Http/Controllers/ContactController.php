<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\Contact;
use App\Traits\Common; 


class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact-form');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string ',
            'email' => 'required|email',
            'message' => 'required|string',
            'subject'   => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'subject'   => $request->subject,
        ];

        Mail::to('HALA@example.com')->send(new ContactFormMail($data));

        return redirect()->back()->with('message', 'Email sent successfully!');
    }
}
    //

