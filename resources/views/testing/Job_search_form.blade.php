@extends ('layout.layout')

@section('content')

<form action="{{ route('search-result') }}" method="POST">
    @csrf
    <label for="job">Job:</label>
    <input type="text" id="job" name="job"><br><br>

    <label for="country">Country:</label>
    <input type="text" id="country" name="country"><br><br>

    <label for="city">City:</label>
    <input type="text" id="city" name="city"><br><br>

    <input type="submit" value="Submit">
</form>


@endsection