<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    // JEAN: This is the view of my search job form! Please do not delete
    // public function showForm(){
    //     return view('testing.Job_search_form');
    // }
    // JEAN: This is the view of my search job form! Please do not delete
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
            ->where('country', $country);
        $searchResult = $searchResult->get();

        $categories = Category::whereHas('jobs', function ($query) use ($city) {
            $query->where('city', '=', $city);
        })->get();


        if ($searchResult->isEmpty()) {

            return view('testing.Jobstesting')->with([
                'error' => 'No jobs found in the specified city and country for the given job. Try a different search!',
                'searchResult' => $searchResult,
                'categories' => $categories,
                'city' => $city,
                'job' => $job
            ]);
        }

        return view('testing.Jobstesting', [
            'searchResult' => $searchResult,
            'categories' => $categories,
            'city' => $city,
            'job' => $job
        ]);
    }

    public function searchByLink(Request $request)
    {
        $city = $request->input('city');
        $job = $request->input('job_title');

        if ($city && $job) {
            $searchResult = Job::where('city', $city)
                ->where('job_title', 'like', '%' . $job . '%')
                ->get();

            $categories = Category::whereHas('jobs', function ($query) use ($city) {
                $query->where('city', '=', $city);
            })->get();

            if ($searchResult->isEmpty()) {

                return view('testing.Jobstesting')
                    ->with(['searchResult' => $searchResult, 'categories' => $categories, 'city' => $city, 'job' => $job])
                    ->with('error', 'No jobs found in the specified city and country for the given job. Try a different search!');
            }

            return view('testing.Jobstesting')
                ->with(['searchResult' => $searchResult, 'categories' => $categories, 'city' => $city, 'job' => $job]);
        }
    }
    //RACHID:THIS FUNCTION WILL FETCH JOBS BASED ON PRICE FILTER FOR THE SECOND RESULTS
    //RACHID:GET THE PRICE RANGE
    public function searchByPrice(Request $request)
    {
        // dump($request->all());
        $city = $request->city;
        $job = $request->job;
        $min_price = $request->min_price;
        $max_price = $request->max_price;

        $categories = Category::whereHas('jobs', function ($query) use ($city) {
            $query->where('city', '=', $city);
        })->get();

        $searchResult = Job::where('job_title', 'like', '%' . $job . '%')
            ->where('city', $city)
            ->get();

        $filteredResults = [];
        if ($min_price !== null && $max_price !== null) {
            foreach ($searchResult as $result) {
                if ($result->price >= $min_price && $result->price < $max_price) {
                    $filteredResults[] = $result;
                }
            }

            if (count($filteredResults) === 0) {
                return view('testing.Jobstesting')
                    ->with(['searchResult' => $filteredResults, 'categories' => $categories, 'city' => $city, 'job' => $job])
                    ->with('error', 'No jobs found in the specified city and country for the given job. Try a different search!');
            }

            return view('testing.Jobstesting')
                ->with(['searchResult' => $filteredResults, 'categories' => $categories, 'city' => $city, 'job' => $job]);
        }
    }
    //JEAN ==== THIS IS FOR THE CUSTOMER TO VIEW THE JOB DETAILS FROM SEARCH RESULT AND SUGGESTED JOBS
    public function jobDetails(Request $request)
    {
        $job = Job::find($request->id);
        return view('testing.Job_detail',  ['job' => $job]); //JEAN: for testing purpose only
    }

    // //RACHID:GET THE PRICE RANGE
    // public function searchByPrice(Request $request)
    // {

    //     dd('price range', $request->all());
    // }

    //RACHID:CREATE JOB BY AUTHENTICATED USER
    public function createJob(Request $request)
    {
        //fetch all existing job categories
        $categories = Category::all();
        $countries = Country::all();

        // TODO: FETCH COUNTRIES AND PASS THEM WITH VIEW FOR COUNTRIES DROPDOWN FIELD

        //return create job form
        return view('testing.job_create_form')->with(['categories' => $categories, 'countries' => $countries]);
    }
    //RACHID:STORE JOB BY AUTHENTICATED USER
    public function storeJob(Request $request)
    {
        //RACHID:ADD FETCHING USER
        $doer = Auth::user();

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
            'price' => $job_data['price'],
            'image_url' => $job_data['image_url'],
            'user_id' => auth()->id(),
            'category_id' => $job_data['category'],
        ]);

        // dd('ALL INPUTS FROM FORM', $job_data);
        $doer_jobs = $doer->jobs;


        return view('testing.Doer_dashboard')->with([
            'message' => 'Job created successfully',
            'doer' => $doer,
            'jobs' => $doer_jobs
        ]);

        // return redirect('site.userDashoard')->with('success', 'Job created successfully');
    }

    //RACHID: DIRECT TO DOER DASHBOARD
    public function doerDashboard(Request $request)
    {
        //THIS WILL GET THE AUTHENTICATED USER OBJECT
        $user = auth()->user();
        //GET DOER ID FROM REUEST
        $doer_id = auth()->id();
        $profile_image = auth()->user()->profile_image;

        //FETCH JOBS THAT THE DOER CREATE FROM DATABASE 
        $jobs = Job::where('user_id', $doer_id)->get();
        // dd($jobs);
        if (!$jobs) {
            return view('testing.Doer_dashboard')->with("message", "You do not have created job yet. press create to start");
        }

        return view('testing.Doer_dashboard', ['jobs' => $jobs, 'profile_image' => $profile_image, 'doer' => $user]);
    }

    //RACHID: THIS FUNCTION COULD BE USED TO FETCH JOBS RESULT
    //BASED ON JOB TITLE COUNTRY AND CITY
    //THIS FUNTION STILL NEED TO ADD CONDITIONS TO THE SEARCH QUERY
    // DELETE THIS FUNCTION
    public function jobs(Request $request)
    {
        $jobId = Job::all()->take(10);

        return view('testing.jobs_all_test')->with('jobs', $jobId);
    }

    //RACHID: THIS FUNCTION WILL BE MODIFIED TO 
    //USED IN FETCHING A JOB BASED ON JOB ID
    //FOR DOER OR USER OR ADMIN(CONDITION ON ROLE)

    //Jean============//
    public function showJobDetailsCreator($id)
    {
        $job = Job::find($id);
        if ($job) {
            //RETURN THE FORM
            return view('testing.Doer_jobdetails', ['job' => $job]);
        }
    }

    //RACHID: THIS FUNCTION WILL BE DELETED LATER
    public function list(Request $request)
    {
        $jobs = Job::all();
        return view('testing.Job_delete_form')->with('doers', $jobs);
        $jobs = Job::all();
        return view('testing.Job_edit_form')->with('doers', $jobs);
    }

    //RACHID:THIS FUNCTION COULD BE USED TO FETCH A JOB 
    //BY ID TO POPULATE EDIT FORM(AUTHENTICATED DOER ONLY)
    public function editJob($id)
    {
        $countries = Country::all();
        //GET CATEGORIES
        $categories = Category::all();
        //FIND THE JOB
        $job = Job::find($id);
        if ($job) {
            //RETURN THE FORM
            return view('testing.job_update_form', ['job' => $job, 'countries' => $countries, 'categories' => $categories]);
        }
    }

    public function updateJob(Request $req)
    {
        //Validate form data
        $req->validate([
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

        $data = Job::find($req->id);

        $data->first_name = $req->first_name;
        $data->last_name = $req->last_name;
        $data->phone = $req->phone;
        $data->address = $req->address;
        $data->country = $req->country;
        $data->job_title = $req->job_title;
        $data->description = $req->description;
        $data->price = $req->price;
        $data->updated_at = now();
        $data->save();

        //RACHID:GET THE DOER PROFILE AND HIS JOBS
        $doer = Auth::user();


        return view('testing.Doer_dashboard')->with([
            'doer' => $doer,
            'jobs' => $doer->jobs,
            'message' => 'Job Updated Successfully',
        ]);
    }

    //RACHID WILL KEEP THIS FUNCTION
    public function delete(Request $request)
    {
        $data = Job::find($request->id);
        $data->delete();

        // RETURN TO DOER DASHBOARD
        //RACHID:GET THE DOER PROFILE AND HIS JOBS
        $doer = Auth::user();

        return view('testing.Doer_dashboard')->with([
            'message' => 'Job deleted successfully',
            'doer' => $doer,
            'jobs' => $doer->jobs
        ]);
    }


    //RACHID: This method handles the api call for fetching cities RACHID===================
    //for specific country
    public function getCities(Request $request)
    {
        dd($request);
        $country_id = $request->country_id;
        dd('country_id', $country_id);
        $cities = City::where('country_id', $country_id)->get();
        dd($cities);

        if (empty($cities)) {
            return response()->json(['error' => 'No cities found.'], 404);
        }
        return response($cities);
    }
}
