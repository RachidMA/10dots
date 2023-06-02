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
            ->limit(4)
            ->get();

        if (!$featuredJobs) {
            return view('welcome');
        }
        return view('testing.welcome')->with('featuredJobs', $featuredJobs);
    }


}
