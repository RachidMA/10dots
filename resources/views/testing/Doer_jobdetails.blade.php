@extends ('layout.layout')

@section('content')
<div class="job-main-content">
    <div class="doer-job-details">
        <div class="doer-job-details-card">
            <div class="job-image">
                <img class="card-img-top" src=" /images/{{$job->image_url}}" alt="Card image cap">
            </div>
            <div class="job-informations">
                <div class="job-title">
                    <h3 class="title">Job Title: {{ $job->job_title }}</h3>
                </div>
                <div class="job-info-text">
                    <p>{{ $job->first_name }} {{ $job->last_name }}</p>
                    <p>Address: {{ $job->address }}</p>
                    <div class="job-country-city">
                        <p class="country"> {{ $job->country }}</p>
                        <p>{{ $job->city }}</p>
                    </div>
                    <p>Price: {{ $job->min_price }} - {{ $job->max_price}}</p>
                </div>
            </div>
        </div>
        <div class="job-description">
            <p>Description: {{$job->description}}</p>
            <div class="edit-delete">
                <a href="{{ route('editJob', ['id' => $job->id]) }}">Edit</a>
                <a href="{{ route('deleteJob', ['id' => $job->id]) }}" class="delete">Delete</a>
            </div>
        </div>
    </div>
</div>

@endsection