@extends ('layout.layout')

@section('content')


<div id="big_circ"></div>
<div class="landing_row_1">
    <h1 id="welcome">Help You Can trust <span>..........</span></h1>
    <h2 id="subwelcome">Find a <span>10 Dots</span> Doer Near You</h2>
</div>
<div class="landing_row_2">
    <form action="/search-job" method="post">
        @csrf

        <div>
            <label for="job">I'm looking for a</label>
            <input type="text" id="job" name="job" placeholder="cleaner, plumber, baby-sitter"><br>
        </div>

        <div>
            <label for="country">in</label>
            <input type="text" id="country" name="country" placeholder="Country">


            <label for="city">in this city:</label>
            <input type="text" id="city" name="city" placeholder="City"><br>
        </div>

        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>

<h1>Welcome to 10dots</h1>
<!-- RACHID: I ADDED THIS LINK TO WORK ON CRAETE JOB FORM(WILL BE MOVE LATE TO THE DOES PAGE) -->
<div class="create-job">
    <a href="{{route('create-job')}}">Create Job</a>
</div>



<!-- JEAN: this is the featured jobs/task -->
<h1 class="fw-light">Featured task</h1>
@foreach ($featuredJobs as $job)
<div class="featuredJob">
    <p>Category: {{ $job->category->name}}</p>
    <p>Job: {{ $job->job_title}}</p>
    <p>name: {{$job->first_name}} {{$job->last_name}}</p>
    <p>adress: {{ $job->address}}</p>
    <p>City: {{ $job->city}}</p>
    <p>country: {{ $job->country}}</p>
    <p>Reviews: ----------</p>
</div>
@endforeach
@endsection