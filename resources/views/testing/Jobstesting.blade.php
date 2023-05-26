@extends ('layout.layout')

@section('content')

<!-- put code here -->
@foreach($searchResult as $job)
<h1 class="fw-light">Search result</h1>
    <div class="test">

        <p>Name: {{ $job->job_title}}</p> 
        <p>Email: {{ $job->city}}</p>
        <p>Message: {{ $job->country}}</p>

    </div>
    @endforeach