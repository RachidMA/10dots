<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{

    // public function showAllJobs(){
    //     return view('welcome');
    // }
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


    $query = Job::query();

    if ($job && $city && $country) {
        $query->where('job_title', 'like', '%' . $job . '%')
            ->where('city', $city)
            ->where('country', $country);


        $searchResult = $query->get();

        if ($searchResult->isEmpty()) {
            return view('job_searchresults', ['searchResult' => $searchResult]);
        // CAN BE USEFUL FOR LATER, IF NOT DELETE
        // } else {
        //     return redirect()->back()->with('error', 'No details found. Try to search again!');
        // }
    } else {
        return redirect()->back()->with('error', 'Please provide all required fields!');
    }
}

    
}
