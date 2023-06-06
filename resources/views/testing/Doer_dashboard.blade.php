@extends('layout.layout')

@section('title', 'content')

@section('content')

<!-- RACHID:DOER DASHBOARD -->
<div class="container  mt-5">
    <div class="row">
        <div class="col-md-4">
            <!-- Profile Container -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile:</h5>
                    <img src="/images/{{$doer->profile_image}}" class="img-fluid rounded-circle mb-3" alt="Profile Image">
                    <p class="card-text">Name: {{$doer->name}}</p>
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
                    <button><a href="{{ route('doer-job-details', ['id' => $job->id]) }}" class="btn btn-primary details-button">Job Details</a></button>
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

@endsection