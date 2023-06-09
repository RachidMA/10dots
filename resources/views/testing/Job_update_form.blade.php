@extends ('layout.layout')

@section('content')

<h1>Edit your details</h1></br>

<div class="form-container">
  <form action="{{ route ('updateJob', [ 'id'=>$job->id ]) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="{{ $job->first_name }}" readonly>
    @error('first_name')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
    <br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="{{ $job->last_name}}" readonly>
    @error('last_name')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
    <br><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" placeholder="Change your phone number" value="{{ $job->phone }}">
    @error('phone')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
    <br><br>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" placeholder="Change your address" value="{{ $job->address }}">
    @error('address')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
    <br><br>

    <!-- RACHID:COUNTRIES AND CITIES DROPDOWN -->
    <div class="country-city">
      <div>
        <label for="country">Country</label>
        <select name="country" id="country">
          <option value="">Select Country</option>
          @foreach ($countries as $country)
          <option value="{{ $country->name }}" @if($job->country==$country->name) selected @endif>{{ $country->name }}</option>
          @endforeach
        </select>
      </div>
      @error('country')
      <div class="error-message">{{$message}}</div>
      @enderror
      <br><br>
      <div>
        <label for="city">City</label>
        <select name="city" id="city">
          <option value="">select city</option>
        </select>
      </div>
      @error('city')
      <div class="error-message">{{$message}}</div>
      @enderror
      <br><br>
    </div>

    <!-- //RACHID: ADDED CATEGORIES LIST -->
    <div>
      <label for="categories">Category:</label>
      <select name="category" id="categories">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" @if($job->category_id == $category->id) selected @endif>{{ $category->name }}</option>

        @endforeach
      </select>
      @error('category')
      <div class="error-message" style="color: red;">{{$message}}</div>
      @enderror
    </div>

    <label for="job_title">Job Title:</label>
    <input type="text" id="job_title" name="job_title" placeholder="Change your job" value="{{ $job->job_title }}">
    @error('job_title')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
    <br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" placeholder="Change your description">{{ $job->description }}</textarea>
    @error('description')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
    <br><br>

    <label for="price">Price Per Houre:</label>
    <input type="number" id="price" name="price" placeholder="price" value="{{ $job->price }}"><br><br>

    <button type="submit">Submit Changes</button>

  </form>
</div>

@endsection