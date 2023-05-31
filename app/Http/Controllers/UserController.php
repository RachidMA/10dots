<?php

namespace App\Http\Controllers;

use App\Models\Job;

use App\Models\User;

use App\Http\Requests;

use Illuminate\Http\Request;


class UserController extends Controller
{
    public function show()
    {
        return view('site.userDetails');
    }

    public function showCard(Job $user)
    {
        $user = Job::all(); // Retrieve the user by ID

        return view("site.userDetails", ['showCard' => $user]);
    }

    public function showReview()
    {
        return view('site.Job-leave-review');
    }
}
