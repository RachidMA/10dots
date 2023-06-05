@extends ('layout.layout')

@section('content')

<h1>Edit your details</h1></br>

<div class="form-container">
    <form action="{{ route ('updateJob', [ 'id'=>$jobs[ 'id' ] ]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value = "{{ $jobs->first_name }}" readonly><br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value = "{{ $jobs[ 'last_name' ] }}" readonly><br><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" placeholder="Change your phone number" value = "{{ $jobs[ 'phone' ] }}"><br><br>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" placeholder="Change your address" value = "{{ $jobs[ 'address' ] }}"><br><br>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" placeholder="Change your city" value = "{{ $jobs[ 'city' ] }}"><br><br>

    <label for="country">Country:</label>
    <input type="text" id="country" name="country" placeholder="Change your country" value = "{{ $jobs[ 'country' ] }}"><br><br>

    <label for="job_title">Job Title:</label>
    <input type="text" id="job_title" name="job_title" placeholder="Change your job" value = "{{ $jobs[ 'job_title' ] }}"><br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" placeholder="Change your description" >{{ $jobs[ 'description' ] }}</textarea><br><br>

    <label for="min_price">Minimum Price:</label>
    <input type="number" id="min_price" name="min_price" placeholder="Change your min price" value = "{{ $jobs[ 'min_price' ] }}"><br><br>

    <label for="max_price">Maximum Price:</label>
    <input type="number" id="max_price" name="max_price" placeholder="Change your max" value = "{{ $jobs[ 'max_price' ] }}"><br><br>>

    <button type = "submit">Submit Changes</button>

    </form>
  </div>
