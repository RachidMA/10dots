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

        $jobs = Job::has('reviews')->inRandomOrder()->take(5)->get(); // Get five random jobs that have reviews
        $countries = Country::all();

        $first_list = [];
        foreach ($jobs as $job) {
            $job_reviews = $job->reviews()->whereBetween('rating', [3, 5])->get();
            // Retrieve job reviews with rating between 4 and 5
            if ($job_reviews->isNotEmpty()) {

                $first_list[] = $job_reviews;
            } else {
                $featuredJobs = [];
                return view('welcome')->with([
                    'featuredJobs' => $featuredJobs,
                    'message' => 'No Jobs Are Available. Please Reload The Page.',
                    'countries' => $countries
                ]);
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
            return redirect()->route('homepage')->with([
                'message' => 'No Jobs Are Available. Please Reload The Page.',
                'countries' => $countries
            ]);
        }

        return view('welcome')->with(['featuredJobs' => $featuredJobs, 'countries' => $countries]);
    }
}
