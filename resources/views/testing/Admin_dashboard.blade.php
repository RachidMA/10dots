@extends('layout.layout')

@section('title', 'content')

@section('content')

<!-- RACHID:ADMIN DASHBOARD -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <!-- Profile Container -->
            <div class="card image-card">
                <div class="card-body">
                    <h5 class="card-title">Profile:</h5>
                    <img src="/images/admin.jpg" class="img-fluid rounded-circle mb-3" alt="Profile Image">
                    <p class="card-text">Name: {{$admin->name}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <!-- Search Form Container -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Search Form</h5>
                    <form action="" method="post">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <!-- RACHID:COUNTRIES AND CITIES DROPDOWN -->
                        <x:testing-components.countries_cities-card :countries='$countries' />

                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <!-- Results Container -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Search Results</h5>
                    <div class="card-deck">
                        <!-- ============ -->
                        @if($jobs !== null && count($jobs) > 0)

                        @foreach($jobs as $job)
                        <x:testing-components.job-preview-card :job="$job" />
                        @endforeach

                        @elseif($jobs !== null && count($sjobs) === 0)
                        <div class="no-jobs-message">
                            <p>No job results found.</p>
                        </div>
                        @else
                        <div class="no-jobs-message">
                            <p>Find Doer by email.</p>
                        </div>
                        @endif
                        <!-- ============ -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection