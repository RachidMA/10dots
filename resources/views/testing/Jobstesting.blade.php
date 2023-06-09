@extends ('layout.layout')

@section('content')

<!-- If 0 result from seach bar -->
<!-- But please fix it bcoz I get error cant display this for the moment -->

@if(session('error'))
<div class="container alert alert-danger alert-dismissible fade show w-50">
    <strong>Error!</strong> {{session('error')}}.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- This is the search result from the search bar -->
    <div class="price-slider">
        <x:price_slider-card :job='$job' :city='$city' />
    </div>
    
    <div class="results_container">
        <h3>Search results in your area</h3>
            <ul class="categories">
                <!-- Assuming this code is within your Blade template -->
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
            <!-- Assuming this code is within your Blade template -->
            @if($searchResult !== null && count($searchResult) > 0)
            @foreach($searchResult as $job)
            <div class="job_result" id="{{$job->id}}">
                <div class="img_div">
                    <img class="" src=" /images/{{$job->image_url}}" alt="Card image cap">
                </div>
                <div class="cat_info">
                        <h2>{{ $job->job_title }}</h2>
                        <p>name: {{$job->first_name}} {{$job->last_name}}</p>
                        <div class="">
                            <p>{{ $job->address}}</p>
                            <p>{{ $job->city}}</p>
                            <p>{{ $job->country}}</p>
                        </div>
                        <p>2700 completed tasks | 188 Doers</p>
                    <a href="{{ route('jobDetails', ['id' => $job->id]) }}">
                        <button class="job_button" >Job Details</button>
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