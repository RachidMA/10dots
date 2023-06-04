@extends ('layout.layout')

@section('content')

<!-- If 0 result from seach bar -->
<!-- But please fix it bcoz I get error cant display this for the moment -->

<!-- @if(session('error'))
    <script>
        alert('{{ session('error') }}');
    </script>
@endif -->

<!-- This is the search result from the search bar -->

<h1 class="fw-light">Search result</h1>
@foreach($searchResult as $job)
    <div class="test">
    <p><a href="{{ route('jobDetails', ['id' => $job->id]) }}">{{ $job->job_title }}</a></p> 
        <p>name: {{$job->first_name}} {{$job->last_name}}</p>
        <p>adress: {{ $job->address}}</p>
        <p>City: {{ $job->city}}</p>
        <p>country: {{ $job->country}}</p>

    </div>
@endforeach

<!-- This the suggested jobs on the left of the page -->
<div class="sidebar">
    <h3>Suggested Jobs</h3>
    <ul>
        @foreach ($suggestedJobs as $job)
    <p><a href="{{ route('jobDetails', ['id' => $job->id]) }}">{{ $job->job_title }}</a></p> 
        <p>name: {{$job->first_name}} {{$job->last_name}}</p>
        <p>adress: {{$job->category->name}}</p>
        <p>City: {{ $job->city}}</p>
        <p>country: {{ $job->country}}</p>
        @endforeach
    </ul>
</div>

@endsection