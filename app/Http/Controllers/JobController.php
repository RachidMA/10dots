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

        $job = $request->input('job'); //these are for the form 'name= job'
        $city = $request->input('city');
        $country = $request->input('country');
        $minPrice = $request->input('price_min');
        $maxPrice = $request->input('price_max');
        
        $query = Job::where('job_title', 'like', '%' . $job . '%')
                    ->where('city',$city )
                    ->where('country', $country);  

        if (!empty($minPrice) && !empty($maxPrice)) 
        {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }            
        // if($job && $city && $country ){
            // $query->where('job_title', 'like', '%' . $job . '%')
            //     ->where('city',$city )
            //     ->where('country', $country);
        // }

        $searchResult = $query->get();

        if(!$searchResult){
            return view ('job_searchresults', $searchResult);
        } else {
            return view ( 'welcome' )->with( 'No Details found. Try to search again !' );
        }

        
    }
    
}
