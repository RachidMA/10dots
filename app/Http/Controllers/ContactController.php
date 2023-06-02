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
        
    
        return redirect()->back()->with('success', 'Thank you for contacting us. We will get back to you soon.');
    }
    
    
}

