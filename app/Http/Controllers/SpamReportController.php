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
    public function reportSpam(Request $request)
    {
        $jobId = $request->input('job_id');
        $job = Job::find($jobId);
        $doer_id = $job->user_id;

        //GET ADMIN EMAIL
        $adminEmail = User::where('role', 1)->first()->email;

        if ($job) {
            $user = User::find($doer_id);

            if ($user) {
                $user->increment('spam_reports');
                $spamReportCount = $user->spam_reports;
                $data = [
                    "admin_email" => $adminEmail,
                    "admin_name" => "10dots Admin",
                    "user" => $user,
                    "spamReportCount" => $spamReportCount
                ];

                if ($spamReportCount == 2) {
                    //SEND THE DOER A WARNING NOTIFICATION
                    Mail::to($user->email)->send(new SpamReportEmail($data));
                    //SEND THE DOER DASHBOARD NOTIFICATION
                    //TODO: CREATE THE SPAM NOTIFICATION

                    //SEND WEBSITE ADMIN A SPAM NOTIFICATION WITH DOER INFORMATION
                    Notification::route('mail', $data['admin_email'])->notify(new SpamReportNotification($data));
                } elseif ($spamReportCount >= 5) {

                    Mail::to($user->email)->send(new SendDoerDeleteEmail($data));

                    Notification::route('mail', $data['admin_email'])->notify(new ProfileDeleteNotification($data));

                    $user->delete();

                    return redirect()->route('homepage');
                }

                return redirect()->back()->with('success', 'User reported as spam successfully.');
            }
        }

        return redirect()->back()->with('error', 'Failed to report user as spam.');
    }
}
