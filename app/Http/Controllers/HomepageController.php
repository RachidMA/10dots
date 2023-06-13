<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Job;
use App\Models\Review;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class HomepageController extends Controller
{
    public function showFeaturedJobs(Request $request)
    {
        $jobs = Job::has('reviews')->inRandomOrder()->take(5)->get();

        $first_list = [];
        foreach ($jobs as $job) {
            $job_reviews = $job->reviews()->whereBetween('rating', [4, 5])->get(); 
            if ($job_reviews->isNotEmpty()) { 
                $first_list[] = $job_reviews;
            }
        }
        $total_jobs = count($first_list);
        $num_keys = min(4, $total_jobs); 

        if ($num_keys > 0) {
            $random_keys = array_rand($first_list, $num_keys); 
            $featuredJobs = [];
            foreach ($random_keys as $key) {
                $featuredJobs[] = $first_list[$key]; 
            }
        } else {
            dd("No jobs with reviews found.");
        }

        $countries = Country::all();

        return view('welcome')->with(['featuredJobs' => $featuredJobs, 'countries' => $countries]);
    }
    
}
