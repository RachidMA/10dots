@extends ('layout.layout')

@section('content')

<!-- put code here -->
@foreach($searchResult as $job)
<h1 class="fw-light">Search result</h1>
    <div class="test">

        <p>Job: {{ $job->job_title}}</p> 
        <p>City: {{ $job->city}}</p>
        <p>Country: {{ $job->country}}</p>

    </div>
@endforeach

@endsection