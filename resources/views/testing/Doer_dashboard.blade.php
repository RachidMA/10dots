@extends('layout.layout')

@section('title', 'content')

@section('content')
<div class="doer-main-container">
    <div class="doer-container">
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
        <div class="container  mt-4">
            <div class="row profile_row">
                <div class="col-md-4 ">
                    <!-- Profile Container -->
                    <div class="card">
                        <div class="card-body">
                            <!-- <img src="/images/{{$doer->profile_image}}" class="img-fluid rounded-circle mb-3" alt="Profile Image"> -->
                            <x:testing-components.image_profile-card />
                            <div class="profile-text-info">
                                <div class="info-1">
                                    <p class="card-text">Name: {{$doer->name}} </p>
                                    <p class="card-text">Email: {{$doer->email}} </p>
                                </div>
                                <div class="info-2">
                                    <p class="card-text">Address: {{$doer->jobs()->first()->address ? $doer->jobs()->first()->address: ""}}</p>
                                    <p class="card-text">{{$doer->jobs()->first()->country}}, {{$doer->jobs()->first()->city}}</p>
                                    <div class="number-jobs">
                                        <p>Total Jobs: {{count($doer->jobs()->get())}}</p>
                                    </div>
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
                            <img class="card-img-top" src="/images/{{$job->image_url ? $job->image_url:'job_default.png'}}" alt="Card image cap">
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

</div>


@endsection