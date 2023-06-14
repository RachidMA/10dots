@extends ('layout.layout')

@section('content')

@if(session('error'))
<div class="container alert alert-danger alert-dismissible fade show w-50">
    <strong>Error!</strong> {{session('error')}}.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="price-slider">
    <x:price_slider-card :job='$job' :city='$city' />
</div>

<div class="results_container">
    <h3>Search results in your area</h3>
    <ul class="categories">

        @foreach ($categories as $category)
        <h2>{{ $category->name }} jobs:</h2>
        <ul>
            @foreach ($category->jobs()->where('city', $city)->get() as $job)
            <li>
                <a href="{{route('search-by-link', ['job_title'=>$job->job_title, 'city'=>$city])}}" class="category-job-link">{{$job->job_title}}</a>
            </li>
            @endforeach
        </ul>
        @endforeach
    </ul>

    @if($searchResult !== null && count($searchResult) > 0)
    @foreach($searchResult as $job)
    <div class="job_result" id="{{$job->id}}">
        <div class="img_div">
            <img class="" src="/images/{{$job->image_url ? $job->image_url:'job_default.png'}}" alt="Card image cap">
        </div>
        <div class="cat_info">
            <h2>{{ $job->job_title }} | <span class="job-category">{{$job->category->name}}</span> </h2>

            <p>name: {{$job->first_name}} {{$job->last_name}}</p>
            <p>{{ $job->address}}</p>
            <p>{{ $job->city}}</p>
            <p>{{ $job->country}}</p>
            <p>2700 completed tasks | 188 Doers</p>
            <h3>{{$job->price ? $job->price : 'No price set'}}</h3>
            <a href="{{ route('jobDetails', ['id' => $job->id]) }}">
                <button class="job_button">Job Details</button>
            </a>
        </div>
    </div>
    @endforeach
    @elseif($searchResult !== null && count($searchResult) === 0)
    <div class="no-jobs-message">
        <p>No Jobs Found In Your Area.</p>
    </div>
    @else
    <div class="no-jobs-message">
        <p>Error: Unable to fetch Jobs results.</p>
    </div>
    @endif
</div>
@endsection