<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;

class ReviewController extends Controller
{
    public function review(Request $request) {
        $review = Review::find($request->job_id);
        dd($review);
        return view ('testing.Job-leave-review');
    }
    
}
