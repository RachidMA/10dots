@extends ('layout.layout')

@section('content')
<!-- put code here -->
@foreach($searchResult as $job)
<h1 class="fw-light">Search result</h1>
    <div class="test">

        <p>Job: {{ $job->job_title}}</p> 
        <p>name: {{$job->first_name}} {{$job->last_name}}</p>
        <p>adress: {{ $job->address}}</p>
        <p>City: {{ $job->city}}</p>
        <p>country: {{ $job->country}}</p>

    </div>
@endforeach
<!-- If 0 result from seach bar -->
<!-- @if(session('error'))
        alert('{{ session('error') }}');
@endif -->

@endsection