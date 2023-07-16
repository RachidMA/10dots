<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Doer_contact;
use App\Mail\ContactDoer;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Contracts\Mail\Mailable;



class DoerContactController extends Controller
{
    public function showContact($jobId)
    {
        return view('testing.Doer_contact', compact('jobId'));
    }


    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            'date' => 'required|date',
            'job_id' => 'required|exists:jobs,id',
        ]);

        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $message = $request->input('message');
        $date = $request->input('date');
        $jobId = $request->input('job_id');
        $doerEmail = Job::find($jobId)->user->email;

        $contact = new Doer_contact();
        $contact->job_id = $jobId;
        $contact->job_title = Job::find($jobId)->job_title;
        $contact->name = $name;
        $contact->phone = $phone;
        $contact->email = $email;
        $contact->message = $message;
        $contact->date = $date;
        $contact->save();

        $job = Job::find($jobId);

        $mail = new ContactDoer($job->job_title, $name, $phone, $email, $message, $date, $jobId);

        Mail::to($doerEmail)->send($mail->buildForDoer());
        Mail::to($email)->send($mail->buildForCustomer());

        //Send doer notification to be displayed in his dashboard
        //Store new notification in the notifications table
        //THIS IS NOTIFICATION TABLE NOT EMAIL NOTIFICATION
        Notification::insert([
            'title' => 'Request job sent from customer',
            'message' => 'You have received an email from one of our customers requesting your service. Please check your email box.',
            'user_id' => $job->user->id,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Job request submitted successfully!');
    }
}
