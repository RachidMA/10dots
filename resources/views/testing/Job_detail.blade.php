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
<button>Book now</button> 
<button>Contact me</button> 
<button>Leave a Review</button>
</div>

<div class= 'review'>
    <form>
    <input type="radio" id="star5" name="rate" value="5" />
      <label for="star5" title="text">5 stars</label>
      <input type="radio" id="star4" name="rate" value="4" />
      <label for="star4" title="text">4 stars</label>
      <input type="radio" id="star3" name="rate" value="3" />
      <label for="star3" title="text">3 stars</label>
      <input type="radio" id="star2" name="rate" value="2" />
      <label for="star2" title="text">2 stars</label>
      <input type="radio" id="star1" name="rate" value="1" />
      <label for="star1" title="text">1 star</label>
    </form>
</div>
@endsection