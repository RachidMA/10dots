<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function showFeaturedJobs()
    {

        $featuredJobs = Job::inRandomOrder()
            ->limit(6)
            ->get();

        if (!$featuredJobs) {
            return view('welcome');
        }
        return view('testing.welcome')->with('featuredJobs', $featuredJobs);
    }
}
