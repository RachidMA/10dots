<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{

    // public function showAllJobs(){
    //     return view('welcome');
    // }
    public function showForm(){
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


        $query = Job::where('job_title', 'like', '%' . $job . '%')
                    ->where('city', $city)
                    ->where('country', $country);
        $searchResult = $query->get();
        return ('hello');
        // return view('testing.Job_search_form', ['Job_search_form' => $searchResult]);
        // return redirect()->back()->with('error', 'No details found. Try to search again!');
        }
        }