@extends('layout.layout')

@section('content')
<h1>Welcome to 10dots</h1>
<!-- RACHID: I ADDED THIS LINK TO WORK ON CRAETE JOB FORM(WILL BE MOVE LATE TO THE DOES PAGE) -->
<div class="create-job">
    <a href="{{ route('create-job', ['id' => Auth::id()]) }}">Create Job</a>

</div>



<!-- JEAN: this is the featured jobs/task -->
<h1 class="fw-light">Featured task</h1>
@foreach ($featuredJobs as $job)
<div class="featuredJob">
    <p>Category: {{ $job->category->name}}</p>
    <p>Job: {{ $job->job_title}}</p>
    <p>name: {{$job->first_name}} {{$job->last_name}}</p>
    <p>Reviews: ----------</p>
</div>
@endforeach

@endsection