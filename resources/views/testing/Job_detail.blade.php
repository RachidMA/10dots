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

<div id="reviewFormContainer" class= 'review'>

<form method= "POST" action= "{{ route ('leaveReview') }}" >
    @csrf

    <h1>Leave a review</h1>

    <div class="mb-3">
        <label for="name" class="form-label">Your Name</label> 
        <input type="text" name = "name"  placeholder="enter your name here" id="name">

        <label for="name" class="form-label">Your Email</label> 
        <input type="email" name = "email"  placeholder="enter your email here" id="email">
    </div>

    <div class="rate">
        <input type="radio" id="star5" name="rating" value="5" />
        <label for="star5" title="text">5 dots</label>

        <input type="radio" id="star4" name="rating" value="4" />
        <label for="star4" title="text">4 dots</label>

        <input type="radio" id="star3" name="rating" value="3" />
        <label for="star3" title="text">3 dots</label>

        <input type="radio" id="star2" name="rating" value="2" />
        <label for="star2" title="text">2 dots</label>

        <input type="radio" id="star1" name="rating" value="1" />
        <label for="star1" title="text">1 dot</label>
    </div>

    <div class="mb-3">
        <label for="comment" class="form-label">Comments</label> 
        <textarea id="textarea" rows="3" cols="25" name = "comment" id="comment"></textarea>
    </div>
          
      <input type="hidden" name="job_id" id = "job_id" value ="6">

      <button type="submit" name = "submit" id="submit" >Submit</button>

</form>
</div>



 

     
@endsection