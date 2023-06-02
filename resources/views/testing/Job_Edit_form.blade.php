<h1>Edit your Information</h1>

<div class = "editCard">
    <img src = "{{ $doer[ 'img_url' ] }}" alt="Doer profile image">
    <div class = "container">
    <h2>Name: {{ $doer[ 'first_name' ] }} {{ $doer[ 'last_name' ] }}</h2>
        <p><h3>Job: {{ $doer[ 'job_title' ] }}</h3></p>
        <p>Rate: {{ $doer[ 'min_price' ] }} - {{ $doer[ 'max_price' ] }} euros</p>
        <p>Description: {{ $doer[ 'description' ] }}</p>
        <p>Address: {{ $doer[ 'address' ] }}</p>
        <p>City: {{ $doer[ 'city' ] }}, {{ $doer[ 'country' ] }}</p>
        <p>Phone Number: {{ $doer[ 'phone' ] }}</p>
    </div>
<button><a href = "{{  route ('updateJob', [ 'id'=>$doer->id]) }}">Edit</a></button>
</div>
