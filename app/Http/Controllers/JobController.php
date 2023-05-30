<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{

    // public function showAllJobs(){
    //     return view('welcome');
    // }

    public function showForm()
    {
        return view('testing.Job_search_form');
    }
    public function search(Request $request)
    {
        $info = [
            'job' => 'required',
            'city' => 'required',
            'country' => 'required',
        ];
        $request->validate($info);

        $job = $request->input('job');
        $city = $request->input('city');
        $country = $request->input('country');

        $searchResult = Job::where('job_title', 'like', '%' . $job . '%')
        ->where('city', $city)
        ->where('country', $country)
        ->get();

        $suggestedJobs = Job::where('city', '!=', $city)
        ->orWhere('country', '!=', $country)
        ->limit(5) //limit to 5 can put more
        ->get();

        //Instead of returning the view this is used to see if Im catching something from database
        dd($searchResult);
        dd($suggestedJobs);


        //Uncomment if the view is in order bcoz the file here is for testing purpose only

    //     if ($searchResult->isEmpty()) {
    //         return redirect()->back()->with('error', 'No jobs found in the specified city and country for the given job. Try a different search!');
    //     } else {
    //         return view('testing.Jobstesting', ['searchResult' => $searchResult, 'suggestedJobs' => $suggestedJobs]);
    //     }
    }

}
