@extends ('layout.layout')

@section('content')
<div class="job_details">
    <div class="img_div">
        <img class="card-img-top" src="/images/{{$job->image_url ? $job->image_url:'job_default.png'}}" alt="Card image cap">
    </div>
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
            <h3 class="title">Job Title: {{ $job->job_title }}</h3>
            <p>{{ $job->first_name }} {{ $job->last_name }}</p>
            <p>Address: {{ $job->address }}</p>
            <p class="country"> {{ $job->country }}</p>
            <p>{{ $job->city }}</p>
            @if($job->price)
            <p class="price">Price: {{$job->price}} €</p>
            @else
            <p>Price: No Price Was Set</p>
            @endif
        </div>
        <p>Description: {{$job->description}}</p>
        <a href="{{ route('editJob', ['id' => $job->id]) }}">Edit</a>
        <a href="{{ route('deleteJob', ['id' => $job->id]) }}" class="delete">Delete</a>
</div>

@endsection