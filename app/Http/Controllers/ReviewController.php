<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;

class ReviewController extends Controller
{
    public function review(Request $request)
    {
        $jobId = $request->job_id;
        return view('testing.Job-leave-review');
    }

    public function saveReview(Request $request)
    {
        $review = new Review();
        $review->name = $request->name;
        $review->email = $request->email;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->job_id = $request->job_id;
        $review->save();
        return redirect()->back()->with('message', 'success saved in database'); //should redirect to jobdetails card
    }
}
