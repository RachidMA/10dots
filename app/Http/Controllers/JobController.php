<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;


class JobController extends Controller
{
    // ======JEAN: From showFeaturedJobs to Search=====//
    public function showFeaturedJobs(Request $request)
    {

        $featuredJobs = Job::inRandomOrder()
            ->limit(6)
            ->get();

        // dd ($featuredJobs);
        return view('welcome', ['featuredJobs' => $featuredJobs]);
    }
    public function showForm()
    {
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

        $searchResult = Job::where('job_title', 'like', '%' . $job . '%')
            ->where('city', $city)
            ->where('country', $country)
            ->get();

        $suggestedJobs = Job::where('city', '!=', $city)
            ->orWhere('country', '!=', $country)
            ->limit(5) //limit to 5 can put more
            ->get();

        //Instead of returning the view this is used to see if Im catching something from database
        // dd($searchResult);
        // dd($suggestedJobs);
        // dd($searchResult);

        //Uncomment if the view is ready bcoz the file here is for testing purpose only

        //     if ($searchResult->isEmpty()) {
        //         return redirect()->back()->with('error', 'No jobs found in the specified city and country for the given job. Try a different search!');
        //     } else {
        //         return view('testing.Jobstesting', ['searchResult' => $searchResult, 'suggestedJobs' => $suggestedJobs]);
        //     }
    }



    //RACHID:CREATE JOB BY AUTHENTICATED USER
    public function createJob(Request $request)
    {
        //fetch all existing job categories
        $categories = Category::all();

        // TODO: FETCH COUNTRIES AND PASS THEM WITH VIEW FOR COUNTRIES DROPDOWN FIELD


        //return create job form
        return view('testing.job_create_form')->with('categories', $categories);
    }
    //RACHID:STORE JOB BY AUTHENTICATED USER
    public function storeJob(Request $request)
    {
        // dd($request);
        //Validate form data
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required', 'regex:/[0-9+\-\(\)\s]*$/'],
            'address' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'category' => ['required'],
            'job_title' => ['required'],
            'description' => ['required'],
            'image_url' => ['image', 'mimes:jpeg, png, jpg, gif|max:2048'],
        ]);


        //GET DATA FROM REQUEST AFTER IT PASSES VALIDATION 
        $job_data = $request->all();

        // ///Get the category_id based on category name(We use this method because we need to include category name in error message)
        // $category_id = Category::where('name', $job_data['category']);


        //Check if we have uploaded image
        if ($image = $request->file('image_url')) {
            //Get File Name With Extension
            $image_name = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('images'), $image_name);

            //Update the image name(path) inside $request['image_url']
            $job_data['image_url'] = $image_name;
        } else {
            //Store a default image in public/images
            $job_data['image_url'] = 'default.jpg';
        }

        // //CHECK IF THERE IS MIN_PRICE AND MAX_PRICE
        // if ($request->min_price && $request->max_price) {
        //     //IF MIN_PRICE AND MAX_PRICE EXIST
        //     //CHECK IF MIN_PRICE > MAX_PRICE
        //     if ($request->min_price > $request->max_price) {
        //         //IF MIN_PRICE > MAX_PRICE
        //         //RETURN ERROR MESSAGE
        //         return redirect()->back()->with('error', 'Min price should be less than max price');
        //     } else {
        //         //IF MIN_PRICE < MAX_PRICE
        //         //UPDATE MIN_PRICE AND MAX_PRICE
        //         $job_data['min_price'] = $request->min_price;
        //         $job_data['max_price'] = $request->max_price;
        //     }
        // } else {
        //     $job_data['min_price'] = null;
        //     $job_data['max_price'] = null;
        // }

        //STORE THE DATA INTOR DATABASE
        Job::insert([
            'first_name' => $job_data['first_name'],
            'last_name' => $job_data['last_name'],
            'phone' => $job_data['phone'],
            'address' => $job_data['address'],
            'country' => $job_data['country'],
            'city' => $job_data['city'],
            'job_title' => $job_data['job_title'],
            'description' => $job_data['description'],
            'min_price' => $job_data['min_price'],
            'max_price' => $job_data['max_price'],
            'image_url' => $job_data['image_url'],
            'user_id' => auth()->id(),
            'category_id' => $job_data['category'],
        ]);

        dd('ALL INPUTS FROM FORM', $job_data);

        // return redirect('site.userDashoard')->with('success', 'Job created successfully');
    }

    public function jobs(Request $request)
    {
        $jobId = Job::all()->take(10);

        return view('testing.jobs_all_test')->with('jobs', $jobId);
    }

    public function jobDetails(Request $request)
    {
        $job = Job::find($request->id);
        dd($job);
    }
}
