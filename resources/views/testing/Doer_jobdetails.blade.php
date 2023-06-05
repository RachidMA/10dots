@extends ('layout.layout')

@section('content')

<h1>Job Details</h1>
<p>Job Title: {{ $job->job_title }}</p>
<p>Name: {{ $job->first_name }} {{ $job->last_name }}</p>
<p>Address: {{ $job->address }}</p>
<p>City: {{ $job->city }}</p>
<p>Country: {{ $job->country }}</p>
<p>Image: {{ $job->image_url}}</p>
<p>Description: {{$job->description}}</p>
<p>Price: {{ $job->min_price }} - {{ $job->max_price}}</p>

<button><a href="{{ route('editJob', ['id' => $job->id]) }}" class="btn btn-primary">Edit</a></button>
<button><a href="{{ route('deleteJob', ['id' => $job->id]) }}" class="btn btn-primary">Delete</a></button>

@endsection