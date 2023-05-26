@extends ('layout.layout')

@section('content')

<form action="/search-job" method="post">
    @csrf
    <label for="job">Job:</label>
    <input type="text" id="job" name="job"><br><br>

    <label for="city">City:</label>
    <input type="text" id="city" name="city"><br><br>

    <label for="country">Country:</label>
    <input type="text" id="country" name="country"><br><br>

    <label for="price_min">Minimum Price:</label>
    <input type="text" id="price_min" name="price_min"><br><br>
    
    <label for="price_max">City:</label>
    <input type="text" id="price_max" name="price_max"><br><br>

    <input type="submit" value="Submit">
</form>

@endsection