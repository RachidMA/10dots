@extends ('layout.layout')

@section('content')

<!-- put code here -->
<h1 class="fw-light">Search result</h1>
    <div class="contactInfo">
        <p>Name: {{ $job }}</p> 
        <p>Email: {{ $city }}</p>
        <p>Message: {{ $country}}</p>
    </div>
@endsection