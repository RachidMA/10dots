<?php

namespace App\Http\Controllers;

use App\Models\Job;

use App\Models\User;

use App\Http\Requests;

use Illuminate\Http\Request;


class UserController extends Controller
{
    //RACHID: REMOVE SHOW() DUPLICATED
    //RACHID: THIS FUNCTION TO USE A USER PROFILE VIEW
    public function showCard(Request $request)
    {

        //GET USER OBJECT
        $doer = User::find($request->id);

        //Jobs related to a doer
        $jobs = $doer->jobs()->get();
        // dd($user_jobs);
        //GET USER JOB CREATED
        // return view("site.userDetails", ['showCard' => $user]);
        return view('site.userDetails', ['doer' => $doer, 'jobs' => $jobs]);
    }

    public function showReview()
    {
        return view('site.Job-leave-review');
    }
}
