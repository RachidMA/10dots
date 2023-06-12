@extends('layout.layout')

@section('title', 'content')

@section('content')
    <!-- Success message -->
    <!-- @if(session('message'))
    <div class="container alert alert-success alert-dismissible fade show w-50">
        <strong>Success!</strong> {{session('message')}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif -->
    @if(session('success'))
    <div class="success-message message" id="successMessage">
        <strong>Success! </strong>{{session('success')}}
        <button type="button" class="close-success close-button">X</button>
    </div>
    @elseif(session('error'))
    <div class="error-message message" id="errorMessage">
        <strong>Error! </strong>{{session('error')}}
        <button type="button" class="close-error close-button">X</button>
    </div>
    @endif
    <!-- Profile Container -->
<div class="dash_profile">
    <div class="doer_image">
        <img src="/images/{{Auth()->user()->profile_image ? Auth()->user()->profile_image : 'default.jpg'}}" alt="" class="">
    </div>
    <div class="upload">
        <form action="{{route('store-avatar')}}" method="POST" enctype="multipart/form-data" id="image-upload">
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
    <p class="card-text">Name: {{$doer->name}} </p>
    <p class="card-text">Email: {{$doer->email}} </p>
    <p class="card-text">Address: {{$doer->jobs()->first() ? $doer->jobs()->first()->address: ""}}</p>
    <p class="card-text">{{$doer->jobs()->first()? $doer->jobs()->first()->country : ""}} {{$doer->jobs()->first()? $doer->jobs()->first()->city : ""}}</p>
    <p>Total Jobs: {{$doer->jobs()->get()? count($doer->jobs()->get()) : 0}}</p>
</div>
<!-- ============ -->
@if($jobs !== null && count($jobs) > 0)

<div class="results_container">
    @foreach($jobs as $job)
    <div class="job_result" id="{{$job->id}}">
        <div class="img_div">
            <img class="" src="/images/{{$job->image_url ? $job->image_url:'job_default.png'}}" alt="Card image cap">
        </div>
        <div class="cat_info">
            <h5>
                {{$job->job_title}}
            </h5>
            <p>
                2700 completed tasks | 188 Doers
            </p>
            <!-- JEAN -->
            <a href="{{ route('doer-job-details', ['id' => $job->id]) }}">
                <button class="job_button">Job Details</button>
            </a>
        </div>
    </div>
    @endforeach
</div>
@elseif($jobs !== null && count($jobs) === 0)
<div class="no-jobs-message">
    <p>No job results found.</p>
</div>
@else
<div class="no-jobs-message">
    <p>Error: Unable to fetch job results.</p>
</div>
@endif
@endsection