<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Doer_contact;
use App\Mail\ContactDoer;
use Illuminate\Contracts\Mail\Mailable;

use Illuminate\Http\Request;

class DoerContactController extends Controller
{
    public function showContact()
    {
        return view('testing.Doer_contact');
    }
    public function submitForm(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            'date' => 'required|date',
        ]);

        // Retrieve form data
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $message = $request->input('message');
        $date = $request->input('date');

        // Store the contact information in the database
        $contact = new Doer_contact();
        $contact->name = $name;
        $contact->phone = $phone;
        $contact->email = $email;
        $contact->message = $message;
        $contact->date = $date;
        $contact->save();

//==========For The moment send email to us. Bcoz we only have mailtrap testing========//
        Mail::to($email)->send(new ContactDoer($name, $phone, $email, $message, $date));


        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}

//=============THIS CODE IS WHEN YOU HAVE DOMAIN AND CONTACT THE PERSON DIRECTLY====//
//     public function submitForm(Request $request)
// {
// //     // Validate form data
//     $request->validate([
//         'name' => 'required|string',
//         'phone' => 'required|string',
//         'email' => 'required|email',
//         'message' => 'required|string',
//         'date' => 'required|date',
//     ]);

//     // Retrieve form data
//     $name = $request->input('name');
//     $phone = $request->input('phone');
//     $email = $request->input('email');
//     $message = $request->input('message');
//     $date = $request->input('date');

//     // Get the doer's email address

//     $jobId = $request->input('job_id');
//     $doerEmail = Job::find($jobId)->user->email;

//     // Store the contact information in the database
//     $contact = new Doer_contact();
//     // $contact->job_id = $jobId;
//     // $contact->job_title = Job::find($jobId)->title;
//     $contact->name = $name;
//     $contact->phone = $phone;
//     $contact->email = $email;
//     $contact->message = $message;
//     $contact->date = $date;
//     $contact->save();

//     // Send email to the creator
//     Mail::to($doerEmail)->send(new ContactDoer (Job::find($jobId)->title,$name, $phone, $email, $message, $date));

//     // Redirect after successful submission
//     return redirect()->back()->with('success', 'Form submitted successfully!');
// }