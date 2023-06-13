<?php

namespace App\Http\Controllers;

use App\Models\Job;

use App\Models\User;

use App\Http\Requests;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    //RACHID: REMOVED SHOWCARD FUNCTION


    public function showReview()
    {
        return view('site.Job-leave-review');
    }

    //RACHID: RETURN ADMIN DASHBOARD
    public function adminDashboard(Request $request)
    {
        //GET DOER EMAIL ADDRESS FROM SESSION
        $doer_email = $request->session()->get('doer_email') ?  $request->session()->get('doer_email') : null;

        //REMOVE THE JOBS FROM HERE HERE THE SEARCH ROUTE AND CONTROLLER ARE CREATED
        //$JOB = NULL IS CREATED TO AVOID THE JOBS UNDEFINE ERROR
        $job = null;
        $admin_id = Auth::id();
        $admin = Auth::user();
        // $jobs = Job::all()->take(3);
        //GET ALL COUNTRIES
        $countries = Country::all();
        //RETURN ADMIN DASHBOARD
        return view('testing.Admin_dashboard')->with(['admin' => $admin, 'countries' => $countries, 'job' => $job, 'doer_email' => $doer_email]);
    }

    //Store the uploade profile image
    public function StoreAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($avatar = $request->file('avatar')) {
            $avatar_name = time() . '-' . $avatar->getClientOriginalName();
            $avatar->move(public_path('images'), $avatar_name);

            $user = Auth::user();
            $user->profile_image = $avatar_name;
            $user->save();
        } else {
            return back()->with('error', 'Please select your image');
        }

        return back()->with('success', 'The image was successfully uploaded');
    }

    //RACHID:FETCH DOER PROFILE
    public function adminFindDoer(Request $request)
    {


        //FETCH THE DOER PROFILE BY EMAIL
        $doer = User::where('email', $request->email)->first();

        if (!$doer) {
            return redirect()->back()->with('message', 'Doer not found');
        }
        //GET DOER JOBS
        $job = $doer->jobs->first();

        return view('testing.admin_doer_detail', ['name' => Auth::user()->name])->with(['doer' => $doer, 'job' => $job]);
    }

    // RACHID:ADD ABOUT US CONTROLLER FUNCTION
    public function aboutUs()
    {

        $admins = [
            [
                'fullname' => 'AZZAHIR RACHID',
                'languages' => ['PHP', 'LARAVEL', 'JavaScript', 'HTML', 'CSS', 'GIT'],
                'articleLink' => 'https://example.com/admin1-article'
            ],
            [
                'fullname' => 'Admin 2',
                'languages' => ['PHP', 'LARAVEL', 'JavaScript', 'HTML', 'CSS', 'GIT'],
                'articleLink' => 'https://example.com/admin2-article'
            ],
            [
                'fullname' => 'Admin 3',
                'languages' => ['PHP', 'LARAVEL', 'JavaScript', 'HTML', 'CSS', 'GIT'],
                'articleLink' => 'https://example.com/admin3-article'
            ],
            [
                'fullname' => 'Admin 4',
                'languages' => ['PHP', 'LARAVEL', 'JavaScript', 'HTML', 'CSS', 'GIT'],
                'articleLink' => 'https://example.com/admin4-article'
            ],
            [
                'fullname' => 'Admin 5',
                'languages' => ['PHP', 'LARAVEL', 'JavaScript', 'HTML', 'CSS', 'GIT'],
                'articleLink' => 'https://example.com/admin5-article'
            ]
        ];


        if (!$admins < 0) {
            return redirect()->back()->with('message', 'No list is available');
        }
        //Returen about us view
        return view('testing.about_us')->with(['admins' => $admins]);
    }
}
