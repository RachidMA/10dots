<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\VarDumper;

class NotificationController extends Controller
{
    //THIS CONTROLLER RESPONSIBLE OF ALL NOTIFICATIONS
    //THAT DOER MAY RECIEVE UPON CUSTOMER SENDING EMAIL TO DOER
    //OR WHEN CUSTOMER BOOKED A DOER WITH BOOKING OPTION

    //GET ALL NOTIFICATIONS
    public function readAll()
    {

        $user_id = Auth::user()->id;
        //FETCH ALL USER NOTIFICATIONS
        $notifications = Notification::where('user_id', $user_id)->orderBy('created_at', 'DESC')->get();

        //RETURN VIEW TO DISPLY ALL NOTIFIATIONS
        return view('testing.DoerNotifications')->with([
            "notifications" => $notifications,
        ]);
    }

    //READ SINGLE NOTIFICATION
    public function readSingleNotification(Request $request)
    {
        $notification_id = $request->id;
        $notificationObj = Notification::find($notification_id);


        //FIND THE SINGLE CONTROLLER
        $notificationData = Notification::find($notification_id);

        if ($notificationData != null) {
            $notificationData->update([
                'status' => 1
            ]);
            //HOW MANY JOBS THE DOER COMPLETED
            $totalJobsCompleted = $notificationObj->User->completedWork->worksCount;
            if (!$totalJobsCompleted) {
                return view('testing.singleNotification')->with([
                    'notification' => $notificationData,
                    'totalJobsCompleted' => null
                ]);
            }
            return view('testing.singleNotification')->with([
                'notification' => $notificationData,
                'totalJobsCompleted' => $totalJobsCompleted
            ]);
        }
    }
}
