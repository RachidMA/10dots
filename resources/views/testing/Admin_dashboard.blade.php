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
                    <form action="{{ route('admin-find-doer', ['name' => Auth::user()->name]) }}" method="post">
                        @csrf
                        <div class="doer-email">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{$doer_email}}">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection