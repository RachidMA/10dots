<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{

    // public function show(){
    //     return view('welcome');
    // }
    public function search(Request $request)
    {
        $job = $request->input('keyword'); //this keyword is for the form 'name= job'
        $city = $request->input('city');
        $country = $request->input('country');
        
        $query = Job::query();  

        if($job){
            $query->where('job_title', 'like', '%' . $job . '%');
        }
        if($city){
            $query->where('city', 'like', '%' . $city . '%');
        }
        if($country){
            $query->where('country', 'like', '%'  . $country. '%');
        }

        $searchResult = $query->get();

        return view ('job_searchresults', $searchResult);
    }
    
}
