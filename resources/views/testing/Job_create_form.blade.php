@extends ('layout.layout')

@section('content')

<div class="error">
  @if(session('error'))
  <p>{{session('error')}}</p>
  @endif
</div>

<div class="loreg_card">
  <div class="big_circ_2"></div>
  <h2>Want to help a person out?<br>
    <span>Fill in your details to get started</span>
  </h2>
  <form action="{{route('store-job')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input class="form-control" placeholder= "first name" type="text" id="first_name" name="first_name" value="{{old('first_name')}}">
    @error('first_name')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror

    <input class="form-control" placeholder= "last name"type="text" id="last_name" name="last_name" value="{{old('last_name')}}">
    @error('last_name')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror

    <input class="form-control" placeholder= "phone" type="text" id="phone" name="phone" value="{{old('phone')}}">
    @error('phone')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror

    <input class="form-control" placeholder= "adress" type="text" id="address" name="address" value="{{old('address')}}">
    @error('address')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
    <!-- RACHID:COUNTRIES AND CITIES DROPDOWN -->
    <x:testing-components.countries_cities-card :countries='$countries' />

    <!-- //RACHID: ADDED CATEGORIES LIST -->
    <select name="category" id="categories">
      <option value="">Select Category</option>
      @foreach ($categories as $category)
      <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
    @error('category')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror

    <input class="form-control" placeholder= "job title" type="text" id="job_title" name="job_title" value="{{old('job_title')}}">
    @error('job_title')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror

    <textarea class="form-control" placeholder= "describe what you do" id="description" name="description">{{old('description')}}</textarea>
    @error('description')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror

    <input class="form-control" placeholder= "price per hour" type="number" id="price" name="price" value="{{old('price')}}">

    <input type="submit" value="Submit">
  </form>
</div>

@endsection