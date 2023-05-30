@extends ('layout.layout')

@section('content')

<h1>Details page for clicked profile</h1>

<div>
@foreach($jobs as $job)

    <p>Doer image: {{ $job->image_url}}</p> 
    <p>Doer name: {{$job->first_name}} </p>
    <p>Doer address: {{ $job->address}}</p>
    <p>Doer phone: {{ $job->phone}}</p>
    <p>Doer email: {{ $job->email}}</p>
    
@endforeach
</div>

<button type="submit" name = "submit" id="submit" >Send Request</button>

<div>
    <h1>Leave a review</h1>

    <form method= "POST" action= "/leave-review" >
      @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Your Name</label> 
      <input type="text" name = "name"  placeholder="enter your name here" id="name">
    </div>

    <div class=”rating”>
        <label for="content" class="form-label">Review</label> 
        <input type=”radio” name=”rating” value=”5″ id=”5″><label for=”5″>☆</label>
        <input type=”radio” name=”rating” value=”4″ id=”4″><label for=”4″>☆</label>
        <input type=”radio” name=”rating” value=”3″ id=”3″><label for=”3″>☆</label>
        <input type=”radio” name=”rating” value=”2″ id=”2″><label for=”2″>☆</label>
        <input type=”radio” name=”rating” value=”1″ id=”1″><label for=”1″>☆</label>
    </div>

      <div class="mb-3">
        <label for="author" class="form-label">Comments</label> 
        <input type="text" name = "comments" id="comments">
        </div>
        
    <button type="submit" name = "submit" id="submit" >Submit</button>

    </form>
</div>

@endsection
