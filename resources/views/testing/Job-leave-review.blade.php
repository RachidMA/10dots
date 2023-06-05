@extends ('layout.layout')

@section('content')

<h1>Leave a review</h1>

    <form method= "POST" action= "/leave-review" >
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Your Name</label> 
        <input type="text" name = "name"  placeholder="enter your name here" id="name">
      </div>

    <div class="rate">
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
    </div>


        <div class="mb-3">
          <label for="author" class="form-label">Comments</label> 
          <textarea id="textarea" rows="3" cols="25" name = "comments" id="comments"></textarea>
          </div>
          
      <button type="submit" name = "submit" id="submit" >Submit</button>

    </form>

@endsection