<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function contact(){
        return view('contact');
    }

    public function receiveContact(Request $request){
        $content = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            ];
        Mail::to('recipient@email.com')->send( 
            new ContactMail($content),
        );
        
        return "mail sent!";
    }
}