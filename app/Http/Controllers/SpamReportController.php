<?php

namespace App\Http\Controllers;

use App\Mail\SendDoerDeleteEmail;
use App\Mail\SpamReportEmail;
use App\Models\Job;
use App\Models\User;
use App\Notifications\ProfileDeleteNotification;
use App\Notifications\SpamReportNotification;
use Illuminate\Http\Request;

// RACHID:ADD THESE IMPORT
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SpamReportController extends Controller
{
    //
    //RACHID:ADD REPORT SPAM CONTROLLER
    public function reportSpam(Request $request)
    {
        $jobId = $request->input('job_id');

        // Fetch the job
        $job = Job::find($jobId);
        $doer_id = $job->user_id;



        // Check if the job exists
        if ($job) {
            // Fetch the user associated with the job
            $user = User::find($doer_id);

            // Check if the user exists
            if ($user) {
                // Increment the spam report count
                $user->increment('spam_reports');


                // Get the current spam report count
                $spamReportCount = $user->spam_reports;
                $data = [
                    "admin_email" => "azzahir421@gmail.com",
                    "admin_name" => "azzahir",
                    "user" => $user,
                    "spamReportCount" => $spamReportCount
                ];

                // Check the spam report count
                if ($spamReportCount == 2) {
                    // Send email to admin about spam report count being 2
                    Mail::to($user->email)->send(new SpamReportEmail($data));

                    //Send notification to admin
                    Notification::route('mail', $data['admin_email'])->notify(new SpamReportNotification($data));
                } elseif ($spamReportCount >= 5) {
                    // Send email to admin about spam report count being 5 or more
                    Mail::to($user->email)->send(new SendDoerDeleteEmail($data));

                    //Send notification to admin that the doer account has been closed
                    Notification::route('mail', $data['admin_email'])->notify(new ProfileDeleteNotification($data));

                    // Delete the user
                    $user->delete();

                    // Redirect or return a response
                    return redirect()->route('homepage');
                }

                // Redirect or return a response
                return redirect()->back()->with('success', 'User reported as spam successfully.');
            }
        }

        // Redirect or return a response if the job or user was not found
        return redirect()->back()->with('error', 'Failed to report user as spam.');
    }
}
