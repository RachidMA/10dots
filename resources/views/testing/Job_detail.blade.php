@extends ('layout.layout')

@section('content')
<!-- //Jean: -->
<h1>Job Details</h1>
<p>Job Title: {{ $job->job_title }}</p>
<p>Name: {{ $job->first_name }} {{ $job->last_name }}</p>
<p>Address: {{ $job->address }}</p>
<p>City: {{ $job->city }}</p>
<p>Country: {{ $job->country }}</p>
<p>Image: {{ $job->image_url}}</p>
<p>Description: {{$job->description}}</p>
<p>Price: {{ $job->min_price }} - {{ $job->max_price}}</p>
<div class="buttons-container">
<a href="{{ route('contact.show', ['jobId' => $job->id]) }}"><button>Contact me</button></a>

</div>
@endsection