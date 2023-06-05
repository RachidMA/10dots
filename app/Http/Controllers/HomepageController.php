<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Job;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    // ==================Jean=FOR TESTING================//
    public function showFeaturedJobs()
    {

        $featuredJobs = Job::inRandomOrder()
            ->limit(4)
            ->get();

        //RACHID:FETCH ALL COUNTRIES FROM DATABASE
        $countries = Country::all();
        // dd($featuredJobs, $countries);
        if (!$featuredJobs) {
            return view('welcome');
        }

        //RACHID:THIS VIEW WILL BE MODIFIED WHEN ALL REAL VIEWS ARE READY
        return view('.welcome')->with(['featuredJobs', $featuredJobs, 'countries' => $countries]);
    }
    // ==================RACHID: ROUTE TO REAL HOME PAGE================//
    //RACIHD: RETURN HOME VIEW WITH COUNTRIES AND FEATURED JOBS
    // public function showFeaturedJobs()
    // {
    //     //FETCH ALL COUNTRIES WE HAVE IN DARABASE
    //     $countries = Country::all();

    //     $featuredJobs = Job::inRandomOrder()
    //         ->limit(4)
    //         ->get();

    //     //return how page
    //     return view('welcome')->with(['countries' => $countries, 'featuredJobs' => $featuredJobs]);
    // }
}
