<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Review;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class JobController extends Controller
{

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

    //GET THE PRICE RANGE
    public function searchByPrice(Request $request)
    {


        $city = $request->city;
        $job = $request->job;
        $min_price = $request->min_price;
        $max_price = $request->max_price;

        // Store the selected prices in the session
        session()->put('min_price', $min_price);
        session()->put('max_price', $max_price);

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
                    ->with([
                        'searchResult' => $filteredResults,
                        'categories' => $categories,
                        'city' => $city,
                        'job' => $job,
                        'error' => 'No jobs found in the specified city and country for the given job. Try a different search!'
                    ]);
            }

            return view('testing.Jobstesting')
                ->with(['searchResult' => $filteredResults, 'categories' => $categories, 'city' => $city, 'job' => $job]);
        }
    }
    //JEAN ==== THIS IS FOR THE CUSTOMER TO VIEW THE JOB DETAILS FROM SEARCH RESULT AND SUGGESTED JOBS
    public function jobDetails(Request $request)
    {
        $reviews = Review::where('job_id', $request->id)->get();
        if ($reviews) {
            //count how many reviews job has
            $reviewsCount = count($reviews);
        }

        $job = Job::find($request->id);
        return view('testing.Job_detail',  ['job' => $job, 'reviews' => $reviews, 'reviewsCount' => $reviewsCount]);
    }

    //CREATE JOB BY AUTHENTICATED USER
    public function createJob(Request $request)
    {
        //fetch all existing job categories
        $categories = Category::all();
        $countries = Country::all();

        return view('testing.job_create_form')->with(['categories' => $categories, 'countries' => $countries]);
    }

    //STORE JOB BY AUTHENTICATED USER
    public function storeJob(Request $request)
    {
        //ADD FETCHING USER
        $doer = Auth::user();

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

        //Update doer dashboard with new list of created jobs
        $doer_jobs = $doer->jobs;

        return redirect()->route('doer-dashboard', ['id' => $doer->id])->with([
            'success' => 'The job was successfully created',
            'doer' => $doer,
            'jobs' => $doer_jobs
        ]);
    }

    //RACHID: DIRECT TO DOER DASHBOARD
    public function doerDashboard(Request $request)
    {
        //THIS WILL GET THE AUTHENTICATED USER OBJECT
        $user = auth()->user();
        $doer_id = auth()->id();
        $profile_image = auth()->user()->profile_image;

        //FETCH JOBS THAT THE DOER CREATE FROM DATABASE 
        $jobs = Job::where('user_id', $doer_id)->get();

        if (!$jobs) {
            return view('testing.Doer_dashboard')->with("message", "You do not have created job yet. press create to start");
        }

        return view('testing.Doer_dashboard', ['jobs' => $jobs, 'profile_image' => $profile_image, 'doer' => $user]);
    }

    //ADD FUNCTION TO STORE UPLOADED JOB IMAGE
    public function uploadJobImage(Request $request)
    {
        //FIND THE JOB 
        $job = Job::find($request->id);
        //FETCH THE IMAGE FROM REQUEST
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($avatar = $request->file('avatar')) {
            $job_image = time() . '-' . $avatar->getClientOriginalName();
            $avatar->move(public_path('images'), $job_image);

            $job->image_url = $job_image;
            $job->update();
        } else {
            return back()->with('error', 'Please select your image');
        }

        return redirect()
            ->route('doer-dashboard', ['id' => $job->user->id])
            ->with([
                'success' => 'Image was successfully uploaded'
            ]);
    }

    //Jean============//
    public function showJobDetailsCreator($id)
    {
        $job = Job::find($id);
        if ($job) {
            //RETURN THE FORM
            return view('testing.Doer_jobdetails', ['job' => $job]);
        }
    }

    //POPULATE EDIT FORM(AUTHENTICATED DOER ONLY)
    public function editJob($id)
    {
        $countries = Country::all();
        $categories = Category::all();

        $job = Job::find($id);
        if ($job) {
            //RETURN THE FORM
            return view('testing.job_update_form', ['job' => $job, 'countries' => $countries, 'categories' => $categories]);
        }
    }

    //UPDATE JOB WITH NEW ENTERED DATA
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

        //GET THE DOER PROFILE AND HIS JOBS
        $doer = Auth::user();

        // MODIFY THE RETURN FROM UPDATED JOB FUNCTION TO DISPLAY SUCCESS MESSAGE
        return redirect()
            ->route('doer-dashboard', ['id' => $doer->id])
            ->with([
                'success' => 'Job was successfully updated'
            ]);
    }

    //FUNCTION TO HANDLE JOB DELETE
    public function delete(Request $request)
    {
        $data = Job::find($request->id);
        $data->delete();

        // RETURN TO DOER DASHBOARD
        //RACHID:GET THE DOER PROFILE AND HIS JOBS
        $doer = Auth::user();

        return redirect()
            ->route('doer-dashboard', ['id' => $doer->id])
            ->with([
                'error' => 'Job Was successfully Deleted'
            ]);
    }
}
