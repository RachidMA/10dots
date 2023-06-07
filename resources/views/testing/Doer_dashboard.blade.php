@extends('layout.layout')

@section('title', 'content')

@section('content')
<div class="doer-container">
    <!-- RACHID:DOER DASHBOARD -->
    <div class="welcome-error">
        @if(session('message'))
        <!-- Success Alert -->
        <div class="container alert alert-success alert-dismissible fade show w-50">
            <strong>Success!</strong> {{session('message')}}.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <!-- Access Denied Alert -->
        @elseif(session('error'))
        <div class="container alert alert-danger alert-dismissible fade show w-50">
            <strong>Error!</strong> {{session('error')}}.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
    </div>
    <div class="container  mt-5">
        <div class="row profile_row">
            <div class="col-md-4 ">
                <!-- Profile Container -->
                <div class="card">
                    <div class="card-body">
                        <!-- <img src="/images/{{$doer->profile_image}}" class="img-fluid rounded-circle mb-3" alt="Profile Image"> -->
                        <x:testing-components.image_profile-card />
                        <div class="profile-text-info">
                            <div class="info-1">
                                <p class="card-text">Name: {{$doer->name}} 1</p>
                                <p class="card-text">Name: {{$doer->name}} 1</p>
                            </div>
                            <div class="info-2">
                                <p class="card-text">Name: {{$doer->name}} 2</p>
                                <p class="card-text">Name: {{$doer->name}} 2</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row cards-row mt-4">
            <!-- ============ -->
            @if($jobs !== null && count($jobs) > 0)
            <div class="container-reasults">
                @foreach($jobs as $job)
                <div class=" category" id="{{$job->id}}">
                    <div class="cat_img job-image">
                        <img class="card-img-top" src=" /images/{{$job->image_url}}" alt="Card image cap">
                    </div>
                    <div class="cat_info job-detail">
                        <h5>
                            {{$job->job_title}}
                        </h5>
                        <p>
                            2700 completed tasks | 188 Doers
                        </p>
                        <!-- JEAN -->
                        <button class="doer-button"><a href="{{ route('doer-job-details', ['id' => $job->id]) }}" class="doer-details-button">Job Details</a></button>
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

            <!-- ============ -->
        </div>
    </div>

</div>

@endsection