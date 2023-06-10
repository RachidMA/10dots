<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Job;
use App\Models\Review;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class HomepageController extends Controller
{
    // ==================Jean=FOR TESTING================//
    public function showFeaturedJobs(Request $request)
    {
        $jobs = Job::has('reviews')->inRandomOrder()->take(5)->get(); // Get five random jobs that have reviews

        $first_list = [];
        foreach ($jobs as $job) {
            $job_reviews = $job->reviews()->whereBetween('rating', [4, 5])->get(); // Retrieve job reviews with rating between 4 and 5
            if ($job_reviews->isNotEmpty()) { // Only add jobs with reviews to the list
                $first_list[] = $job_reviews;
            }
        }

        //CHECK HOW MANY JOB REVIEWS IN THE FIRST LIST 
        //AND MAKE SURE YOU HAVE MINIMUM BETWEEN 4 AND 1
        $total_jobs = count($first_list);
        $num_keys = min(4, $total_jobs); // Determine the number of random keys to select (minimum of 4 or the total number of jobs)

        if ($num_keys > 0) {
            $random_keys = array_rand($first_list, $num_keys); // Get random keys from the $first_list array
            $featuredJobs = [];
            foreach ($random_keys as $key) {
                $featuredJobs[] = $first_list[$key]; // Retrieve the corresponding jobs based on the random keys
            }
        } else {
            dd("No jobs with reviews found.");
        }
        //RACHID:FETCH ALL COUNTRIES FROM DATABASE
        $countries = Country::all();
        // dd($featuredJobs, $countries);
        // if (!$featuredJobs) {
        //     return view('welcome')->with(['countries' => $countries]);
        // }

        //RACHID:THIS VIEW WILL BE MODIFIED WHEN ALL REAL VIEWS ARE READY
        return view('welcome')->with(['featuredJobs' => $featuredJobs, 'countries' => $countries]);
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
