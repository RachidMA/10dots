<?php

namespace App\Http\Controllers;

use App\Models\Job;

use App\Http\Requests;

use Illuminate\Http\Request;


// class UserController extends Controller
// {
//     public function show () {
//         $jobs = DB::select ('select  first_name from jobs');
//         
//     }
// }

// class UserController extends Controller
// {
//     public function show () {
//          $jobs = Job::all();
//          return view ("userDetails", ['jobs'=>$jobs]);
//     }
   
// }



class UserController extends Controller
{
    public function show($id) {
        $user = Job::findOrFail($id); // Retrieve the user by ID
        
        return view("site.userDetails", ['user' => $user]);
    }
}