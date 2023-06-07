@extends ('layout.layout')

@section('content')

<!-- <div class="error">
  @if(session('error'))
  <p>{{session('error')}}</p>
  @endif
</div> -->
<div class="form-container">
  <form action="{{route('store-job')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="{{old('first_name')}}">
    @error('first_name')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
    <br><br>


    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="{{old('last_name')}}">
    @error('last_name')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
    <br><br>


    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" value="{{old('phone')}}">
    @error('phone')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
    <br><br>


    <label for="address">Address:</label>
    <input type="text" id="address" name="address" value="{{old('address')}}">
    @error('address')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
    <br><br>
    <!-- RACHID:COUNTRIES AND CITIES DROPDOWN -->
    <x:testing-components.countries_cities-card :countries='$countries' />

    <!-- //RACHID: ADDED CATEGORIES LIST -->
    <div>
      <label for="categories">Category:</label>
      <select name="category" id="categories">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
      @error('category')
      <div class="error-message" style="color: red;">{{$message}}</div>
      @enderror
    </div>

    <label for="job_title">Job Title:</label>
    <input type="text" id="job_title" name="job_title" value="{{old('job_title')}}">
    @error('job_title')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
    <br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description">{{old('description')}}</textarea>
    @error('description')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
    <br><br>

    <label for="price">Price Per Houre:</label>
    <input type="number" id="price" name="price" value="{{old('price')}}"><br><br>


    <input type="submit" value="Submit">
  </form>
</div>

@endsection