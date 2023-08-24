@extends('layout.layout')

@section('title', 'content')

@section('content')


<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card image-card">
                <div class="card-body">
                    <h5 class="card-title">Profile:</h5>
                    <div class="admin-image">
                        <img src="/images/{{Auth::user()->profile_image? Auth::user()->profile_image:'profile-image-defalut.png'}}" class="img-fluid mb-3" alt="Profile Image">
                    </div>
                    <div class="upload admin-upload">
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
                    <p class="card-text">Name: {{$admin->name}}</p>
                    <p>Junior Web Developer</p>
                </div>
            </div>
        </div>
        <div class="col-md-8 admin-info">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Search Form</h5>
                    <form action="{{ route('admin-find-doer', ['name' => Auth::user()->name]) }}" method="post">
                        @csrf
                        <div class="doer-email">
                            <label for="email">Find Doer</label>
                            <input type="email" class="custom-input input" name="email" id="email" placeholder="Enter email" value="">
                        </div>
                        <button type="submit" class="btn mt-4">Search</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection