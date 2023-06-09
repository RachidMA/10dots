<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Doer_contact;

class ContactDoer extends Mailable
{
    use Queueable, SerializesModels;

    public $jobTitle;
    public $name;
    public $phone;
    public $email;
    public $message;
    public $date;
    public $jobId;
    public function __construct($jobTitle, $name, $phone, $email, $message, $date, $jobId)
    {   
        $this->jobTitle = $jobTitle;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->message = $message;
        $this->date = $date;
        $this->jobId = $jobId;
    }

    public function buildForCustomer()
    {
        return $this->view('emails.contact_doer')
            ->subject('You booked a job!');
    }
    
    public function buildForDoer()
    {
        return $this->view('emails.notification')
                    ->subject('Your services are needed');
    }
}
