<?php

namespace App\Http\Controllers;

use App\Models\Job;

use App\Models\User;

use App\Http\Requests;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    //RACHID: REMOVED SHOWCARD FUNCTION


    public function showReview()
    {
        return view('site.Job-leave-review');
    }

    //RACHID: RETURN ADMIN DASHBOARD
    public function adminDashboard(Request $request)
    {   //REMOVE THE JOBS FROM HERE HERE THE SEARCH ROUTE AND CONTROLLER ARE CREATED
        //$JOB = NULL IS CREATED TO AVOID THE JOBS UNDEFINE ERROR
        $jobs = null;
        $admin_id = Auth::id();
        $admin = Auth::user();
        // $jobs = Job::all()->take(3);
        //GET ALL COUNTRIES
        $countries = Country::all();
        //RETURN ADMIN DASHBOARD
        return view('testing.Admin_dashboard')->with(['admin' => $admin, 'countries' => $countries, 'jobs' => $jobs]);
    }

    //Store the uploade profile image
    public function StoreAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($avatar = $request->file('avatar')) {
            $avatar_name = time() . '-' . $avatar->getClientOriginalName();
            $avatar->move(public_path('images'), $avatar_name);

            $user = Auth::user();
            $user->profile_image = $avatar_name;
            $user->save();
        } else {
            return back()->with('error', 'Please select your image');
        }

        return back()->with('success', 'The image was successfully uploaded');
    }
}
