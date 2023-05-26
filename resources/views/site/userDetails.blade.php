class UserController extends Controller
{
    public function show($id) {
        $user = Job::findOrFail($id); // Retrieve the user by ID
        
        return view("site.userDetails", ['user' => $user]);
    }
}


userdetails

@extends ('layout.layout')

@section('content')

<h1>Details page for clicked profile</h1>

<div>
    <img src = "">
</div>

<div>
    <h1>{{$jobs->first_name}}</h1>
</div>

<div>
    <h2>address</h2>
</div>

<div>
    <h2>phone</h2>
</div>

<div>
    <h2>email</h2>
</div>

<div class = "reviews">
    <h2>Reviews go here</h2>
</div>
