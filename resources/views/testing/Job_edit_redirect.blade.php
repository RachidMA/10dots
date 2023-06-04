<h1>Your updated Information</h1>

<div class = "editCard">
    <img src = "{{ $job['image_url'] }}" alt="Doer profile image">
    <div class = "container">
    <h2>Name: {{ $job[ 'first_name' ] }} {{ $job[ 'last_name' ] }}</h2>
        <p><h3>Job: {{ $job[ 'job_title' ] }}</h3></p>
        <p>Rate: {{ $job[ 'min_price' ] }} - {{ $job[ 'max_price' ] }} euros</p>
        <p>Description: {{ $job[ 'description' ] }}</p>
        <p>Address: {{ $job[ 'address' ] }}</p>
        <p>City: {{ $job[ 'city' ] }}, {{ $job[ 'country' ] }}</p>
        <p>Phone Number: {{ $job[ 'phone' ] }}</p>
    </div>
</div>