<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
// ==================Jean=================//
    public function showFeaturedJobs()
    {

        $featuredJobs = Job::inRandomOrder()
            ->limit(6)
            ->get();

        if (!$featuredJobs) {
            return view('welcome');
        }
        return view('testing.welcome')->with('featuredJobs', $featuredJobs);
    }

    public function show(){
        return view('testing.Contact');
    }

    public function store(Request $request){
        // $info = [
        //     'name' => 'required|min:3',     
        //     'email' => 'required|email',   
        //     'message' => 'required|min:10',
        // ];

        // $request->validate($info);

        // $name = $request->input('name');
        // $email = $request->input('email');
        // $message = $request->input('message');
    

    }
}
