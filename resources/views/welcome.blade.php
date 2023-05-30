@extends ('layout.layout')

@section('content')

<h1>Welcome to 10dots</h1>
<!-- RACHID: I ADDED THIS LINK TO WORK ON CRAETE JOB FORM(WILL BE MOVE LATE TO THE DOES PAGE) -->
<div class="create-job">
    <a href="{{route('create-job')}}">Create Job</a>
</div>


<!-- this is the featured jobs/task -->

@foreach ($features as $job)
<h1 class="fw-light">Featured task</h1>
<div class="featuredJob">
    <p>Category: {{ $job->category_id}}</p> 
    <p>Job: {{ $job->job_title}}</p> 
    <p>name: {{$job->first_name}} {{$job->last_name}}</p>
    <p>adress: {{ $job->address}}</p>
    <p>City: {{ $job->city}}</p>
    <p>country: {{ $job->country}}</p>
    <p>Reviews: ----------</p>
</div>
@endforeach


@endsection