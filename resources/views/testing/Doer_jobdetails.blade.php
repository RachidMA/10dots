@extends ('layout.layout')

@section('content')
<div class="job-main-content">
    <div class="doer-job-details">
        <div class="doer-job-details-card">
            <div class="job-image">
                <img class="card-img-top" src=" /images/{{$job->image_url}}" alt="Card image cap">
            </div>
            <!-- REUSE THIS FORM TO UPLOAD JOB IMAGE 
    IS BETTER TO HAVE USER UPLOAD IMAGE AFTER JOB IS CREATED NOT WHEN HE IS CREATING THE JOB
    JUST MINIMIZE ISSUES -->
            <div class="upload">
                <form action="{{route('upload-job-image', ['id'=>$job->id])}}" method="POST" enctype="multipart/form-data" id="image-upload">
                    @csrf
                    <div class="round">
                        <i class="fa fa-camera"></i>
                        <input id="file-upload" type="file" name='avatar' />

                        <button type="submit" class="btn btn-primary" id="submit">Upload</button>
                        @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </form>
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
                    @if($job->price)
                    <p class="price">Price: {{$job->price}} €</p>
                    @else
                    <p>Price: No Price Was Set</p>
                    @endif
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