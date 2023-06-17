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

    public function showReview()
    {
        return view('site.Job-leave-review');
    }
    public function adminDashboard(Request $request)
    {

        $doer_email = $request->session()->get('doer_email') ?  $request->session()->get('doer_email') : null;

        $job = null;
        $admin_id = Auth::id();
        $admin = Auth::user();

        $countries = Country::all();

        return view('testing.Admin_dashboard')->with(['admin' => $admin, 'countries' => $countries, 'job' => $job, 'doer_email' => $doer_email]);
    }

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

    public function adminFindDoer(Request $request)
    {

        $doer = User::where('email', $request->email)->first();

        if (!$doer) {
            return redirect()->back()->with('message', 'Doer not found');
        }

        $job = $doer->jobs->first();

        return view('testing.admin_doer_detail', ['name' => Auth::user()->name])->with(['doer' => $doer, 'job' => $job]);
    }


    public function aboutUs()
    {

        $admins = [
            [
                'fullname' => 'AZZAHIR RACHID',
                'title' => 'Backend Developer',
                'languages' => ['PHP', 'Laravel', 'JavaScript', 'HTML', 'CSS', 'Git'],
                'GitLink' => 'https://github.com/RachidMA',
                'image' => 'Rachid-3.jpg'
            ],
            [
                'fullname' => 'Ada Omoji',
                'title' => 'Backend Developer',
                'languages' => ['PHP', 'Laravel', 'JavaScript', 'HTML', 'CSS', 'Git'],
                'GitLink' => 'https://github.com/ada-omoji',
                'image' => 'AdaOmoji.jpg'
            ],
            [
                'fullname' => 'Jean Livara',
                'title' => 'Backend Developer',
                'languages' => ['PHP', 'Laravel', 'JavaScript', 'HTML', 'CSS', 'Git'],
                'GitLink' => 'https://github.com/JeanPinay',
                'image' => 'JeanLivara (2).jpg'
            ],
            [
                'fullname' => 'Vincent Clarysse',
                'title' => 'Frontend Developer',
                'languages' => ['HTML', 'SCSS', 'CSS', 'Laravel', 'Git'],
                'GitLink' => 'https://github.com/VincentClarysse',
                'image' => 'vincent.jpg'
            ],
            [
                'fullname' => 'Claire Pollock',
                'title' => 'Frontend Designer',
                'languages' => ['HTML', 'SCSS', 'CSS', 'Figma'],
                'GitLink' => 'https://github.com/HereThereClaire',
                'image' => 'claire.jpg'
            ]
        ];

        shuffle($admins); // Randomize the array order
        if (!$admins < 0) {
            return redirect()->back()->with('message', 'No list is available');
        }

        return view('testing.about_us')->with(['admins' => $admins]);
    }
}
