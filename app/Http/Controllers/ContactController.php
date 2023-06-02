<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;

class ContactController extends Controller
{
    public function create(){
        return view('testing.Contact');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
    
        $contact = Contact::create($request->all());
    
        Mail::to($request->email)->send(new ContactMail($contact));
        
    
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
    
    
}

