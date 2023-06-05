@extends('layout.layout')

@section('content')
<h5>Welcome to 10dots</h5>
<!-- RACHID: I ADDED THIS LINK TO WORK ON CRAETE JOB FORM(WILL BE MOVE LATE TO THE DOES PAGE) -->
<div class="create-job">

    @if(Auth::check() && Auth::user()->role === 1)
    <a href="{{ route('admin-dashboard', ['name'=>Auth::user()->name])}}">Admin Dashboard</a>
    @elseif(Auth::check() && Auth::user()->role ===0)
    <a href="{{ route('doer-dashboard', ['id' => Auth::id()])}}">Doer Dashboard</a>
    <a href="{{ route('create-job', ['id' => Auth::id()]) }}">Create Job</a>
    @endif
</div>

<!-- RACHID:DISPLAY ERROR AUTHENTICATION MESSAGE FOR PROTECT ROUTES -->
@if(session('auth-error'))
<div class="container alert alert-danger alert-dismissible fade show w-50">
    <strong>Permission Dnied!</strong> {{session('auth-error')}}.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

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