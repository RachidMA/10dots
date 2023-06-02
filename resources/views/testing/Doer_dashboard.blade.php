@extends('layout.layout')

@section('title', 'Doer Dashboard')

@section('content')

<div class="dashboard">
    <div class="message">
        @if(session('message'))
        <p class="message">{{ $message }}</p>
        @endif
    </div>
    <div class="profile-container">
        <div class="image">
            <h2>PROFILE IMAGE</h2>
            <img src="/images/{{$profile_image}}" alt="profile-image">
        </div>
        <div class="doer-info">
            <h2>Doer Info</h2>
        </div>
        THIS IS THE UPLOAD IMAGE FORM
        <!-- <div class="upload-image-form">
            <form action="/doer/upload-image" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" id="image" class="form-control" required>
                <input type="submit" value="Upload" class="btn btn-primary">
            </form>
        </div> -->
    </div>
    <div class="jobs-container">
        <div class="jobs-list">
            <h2>Jobs List</h2>
        </div>
        <div class="job-item">
            <!-- IF DOER HAS MORE THAN ONE JOB LOOP THE JOBS ARRAY -->
            @if(count($jobs) > 1)
            @foreach($jobs as $job)
            <div class="job-list-container">
                <x:testing-components.job-preview-card :job='$job' />
            </div>
            @endforeach
            @else
            <div class="job-list-container">
                <x:testing-components.job-preview-card :job='$job[0]' />
            </div>
            @endif

        </div>
    </div>

    @endsection