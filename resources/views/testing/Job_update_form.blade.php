@extends ('layout.layout')

@section('content')

<h1>Edit your details</h1></br>

<div class="form-container">
    <form action="/updateJob" method="POST" enctype="multipart/form-data">
      @csrf
      
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" readonly><br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" readonly><br><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" placeholder="Change your phone number" value = "{{ $doer[ 'phone' ] }}"><br><br>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" placeholder="Change your address" value = "{{ $doer[ 'address' ] }}"><br><br>

    <label for="country">Country:</label>
    <input type="text" id="country" name="country" placeholder="Change your country" value = "{{ $doer[ 'country' ] }}"><br><br>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" placeholder="Change your city" value = "{{ $doer[ 'city' ] }}"><br><br>

    <label for="job_title">Job Title:</label>
    <input type="text" id="job_title" name="job_title" placeholder="Change your job" value = "{{ $doer[ 'job_title' ] }}"><br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" placeholder="Change your description" value = "{{ $doer[ 'description' ] }}"></textarea><br><br>

    <label for="min_price">Minimum Price:</label>
    <input type="number" id="min_price" name="min_price" placeholder="Change your min price" value = "{{ $doer[ 'min_price' ] }}"><br><br>

    <label for="max_price">Maximum Price:</label>
    <input type="number" id="max_price" name="max_price" placeholder="Change your max" value = "{{ $doer[ 'max_price' ] }}"><br><br>>

    <button type = "submit">Submit Changes</button>

    </form>
  </div>
