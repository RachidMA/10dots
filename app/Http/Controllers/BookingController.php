<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmationMail;
use App\Mail\SendCustomerJobDoneEmail;
use App\Models\Booking;
use App\Models\Job;
use App\Models\Notification;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    //RACHID: BOOK DOER BY CUSTOEMR
    public function bookDoer(Request $request)
    {

        //validate form
        $request->validate([
            'customer-name' => ['required'],
            'customer-number' => ['required', 'numeric', 'digits:10'],
            'customer-email' => ['required', 'email']
        ]);
        //GET JOB ID
        $job_id = $request['job-id'];
        $customerName = $request['customer-name'];
        $customerEmail = $request['customer-email'];
        $customerNumber =  $request['customer-number'];
        //GET THE DOER BASED ON JOB ID
        // $jobObject = Job::find($job_id);
        $doerObject = Job::find($job_id)->user;

        $data = [
            'job_id' => $job_id,
            'customer_name' => $customerName,
            'customer_number' => $customerNumber,
            'customer_email' => $customerEmail,
            'doer' => $doerObject
        ];

        //CREATE BOOKING INSTENCE AND SAVE DATA TO DATABASE
        Booking::insert([
            'customer_name' => $data['customer_name'],
            'customer_number' => $data['customer_number'],
            'customer_email' => $data['customer_email'],
            'job_id' => $data['job_id'],
            'created_at' => Carbon::now()
        ]);


        //SEND EMAIL TO DOER
        //UNCOMMENT THIS LINE WHEN BOOKING IS COMPLETE
        Mail::to([$customerEmail])->send(new BookingConfirmationMail($data));

        //ADD BOOKING NOTIFICATION TO NOTIFICATIONS LIST
        Notification::create([
            'title' => 'Booking Request',
            'message' => 'You have received a booking request ',
            'user_id' => $doerObject->id,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with([
            'success' => 'Your booking was successful! We will send you an confirmation mail.'
        ]);
    }

    //SHOW DOER ALL BOOKING PENDING REQUEST
    public function showAllBooking(Request $request)
    {
        //GET DOER ID
        $doerOjbect = Auth::user();

        //GET DOER ALL JOBS
        $doerJobList = $doerOjbect->jobs;

        if (!$doerJobList) {
            return view('booking.DoerBookingRequest')->with([
                'jobBookingList' => null
            ]);
        }

        $jobBookingList = [];
        foreach ($doerJobList as $doerJob) {
            $pendingRequests = Booking::where('job_id', $doerJob->id)->where('pending', '0')->get();
            if ($pendingRequests) {
                if (count($pendingRequests) > 1) {
                    foreach ($pendingRequests as $request) {
                        array_push($jobBookingList, $request);
                    }
                } elseif (count($pendingRequests) == 1) {
                    array_push($jobBookingList, $pendingRequests[0]);
                } else {
                    continue;
                }
            }
        }

        return view('booking.DoerBookingRequest')->with([
            'jobBookingList' => $jobBookingList
        ]);
    }

    //DOER CONFIRM BOOKING
    public function confirmBooking(Request $request)
    {
        //GET THE BOOKING ID
        $bookingId = $request->booking_id;
        //UPDATE THE BOOKING PENDING CULOMN FROM 0 TO 1
        $bookingObject = Booking::find($bookingId);
        //GET THE DOER
        $doerObject = $bookingObject->job->user;

        $bookingObject->update([
            'pending' => 1,
            'updated_at' => Carbon::now()
        ]);

        $pendingWordList = Booking::where('pending', '0')->get();

        if (count($pendingWordList) < 1) {

            return redirect()->route('doer-dashboard', ['id' => $doerObject->id]);
        }
        return redirect()->back();
    }

    //DOER DECLINE BOOKING REQUEST
    public function declineBooking(Request $request)
    {
        //GET THE BOOKING ID
        $bookingId = $request->booking_id;
        //DELETE THE BOOKING OBJECT
        $bookingObject = Booking::find($bookingId)->delete();

        return redirect()->back();
    }

    //DOER PENDING WORK
    public function pendingWorkPage()
    {

        //GET DOER ID
        $doerOjbect = Auth::user();

        //GET DOER ALL JOBS
        $doerJobList = $doerOjbect->jobs;


        if (!$doerJobList) {
            return view('booking.DoerBookingRequest')->with([
                'jobsPendingList' => null
            ]);
        }

        $jobsPendingList = [];
        foreach ($doerJobList as $doerJob) {
            $jobsPending = Booking::where('job_id', $doerJob->id)->where('pending', '1')->get();

            if (count($jobsPending) > 0) {
                //ARRAY WITH COLLECTION OF ELEMENTS
                if (count($jobsPending) > 1) {

                    foreach ($jobsPending as $jobPending) {
                        array_push($jobsPendingList, $jobPending);
                    }
                    //ARRAY WITH SINGLE ELEMENT
                } elseif (count($jobsPending) == 1) {

                    array_push($jobsPendingList, $jobsPending[0]);
                } else {
                    continue;
                }
            }
        }

        return view('booking.DoerPendingJobs')->with([
            'jobsPendingList' => $jobsPendingList
        ]);
    }
    //IF THE BOOKED JOB IS COMPLETED. FOR EXAMPLE, IF PLUMBER FINISHED HIS TASK AT ONE OF OUR CUSTOMER
    //THE DOER WILL PRESS OK FOR "JOB COMPLETED", AND IF SO, WE DELETE THE JOB BOOKING INSTANCE FROM DATABASE AFTER
    //WE GET CONFRIMATION FROM CUSTOMER THROUGH EMAIL
    //STEP 1: THIS CONTROLLER WILL SEND EMAIL TO CUSTOMER WHEN PLUMBER PRESSES OK FOR JOB COMPLETED
    public function bookedJobCompleted(Request $request)
    {
        //GET BOOKED JOB ID
        $booked_job_id = $request->booked_job_id;
        //job booked object
        $job_booked = Booking::find($booked_job_id);
        //GET JOB OBJECT
        $job = $job_booked->job;


        //CREATE DATA NEEDED FOR THE EMAIL
        $data = [
            "booked_job_id" => $booked_job_id,
            "customer_name" => $job_booked->customer_name,
            "customer_email" => $job_booked->customer_email,
            "job_object" => $job
        ];


        //SEND EMAIL TO CUSTOMER
        Mail::to($job_booked->customer_email)->send(new SendCustomerJobDoneEmail($data));

        return redirect()->back()->with([
            'success' => 'We have send the customer an email to confirm it'
        ]);
    }

    //DELETE BOOKED JOB BY DOER
    public function bookedJobByDoerDelete(Request $request)
    {

        //DELETE BOOKED JOB
        Booking::find($request->booked_job_id)->delte();
        return redirect()->back()->with([
            'success' => 'The job has been deleted successfully.'
        ]);
    }

    //CONFIRMATION COMING FROM CUSTOMER THAT THE WORK IS DONE
    public function confirmWorkDone(Request $request)
    {
        // Get the ID of the booked job instance to delete if the work is done
        $booked_job_id = $request->id;

        // Increment the user finished jobs column in the finished jobs table
        $bookedJob = Booking::find($booked_job_id);
        $doerObject = $bookedJob->job->user;
        $worksDoneObject = Work::where('user_id', '=', $doerObject->id)->first();

        // Increment worksCount by one
        $userFinishedJobs = Work::where('user_id', '=', $doerObject->id)->first();

        if (!$userFinishedJobs) {
            Work::insert([
                "worksCount" => 1,
                "user_id"   => $doerObject->id,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);
        } else {
            $userFinishedJobs->increment('worksCount');
            // Save the changes
            $userFinishedJobs->updated_at = Carbon::now();
            $userFinishedJobs->save();
        }

        // Delete the instance
        Booking::where('id', '=', $booked_job_id)->delete();

        return redirect()->route('jobDetails', ['id' => $bookedJob->job->id]);
    }
}
