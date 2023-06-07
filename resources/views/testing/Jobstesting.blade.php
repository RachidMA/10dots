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
        <div class="more-categories">
            <h4>More Job Categories In Your Area. Check them out</h4>
            <div class="categories-list">
                <ul class="categories">
                    <!-- Assuming this code is within your Blade template -->
                    @foreach ($categories as $category)
                    <h2>{{ $category->name }}</h2>
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
            </div>
        </div>
        <div class="results">
            @if($searchResult !== null && count($searchResult) > 0)
            @foreach($searchResult as $job)
            <div class=" category" id="{{$job->id}}">
                <div class="cat_img job-image">
                    <img class="card-img-top" src=" /images/{{$job->image_url}}" alt="Card image cap">
                </div>
                <div class="cat_info job-detail">
                    <div class="cat_text">
                        <div class="job-title">
                            <h2>{{ $job->job_title }}</h2>
                        </div>
                        <p>name: {{$job->first_name}} {{$job->last_name}}</p>
                        <div class="address">
                            <p>{{ $job->address}}</p>
                            <p>, {{ $job->city}}</p>
                            <p>, {{ $job->country}}</p>
                        </div>
                        <p>2700 completed tasks | 188 Doers</p>
                    </div>
                    <div class="buttons-container">
                        <a href="{{ route('jobDetails', ['id' => $job->id]) }}"><button>Job Details</button></a>
                    </div>
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
    </div>
@endsection