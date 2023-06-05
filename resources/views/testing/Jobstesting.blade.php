@extends ('layout.layout')

@section('content')

<!-- If 0 result from seach bar -->
<!-- But please fix it bcoz I get error cant display this for the moment -->

<!-- @if(session('error'))
    <script>
        alert('{{ session('error') }}');
    </script>
@endif -->
<!-- This is the search result from the search bar -->
<div class="container-reasults">
    <div class="price-slider">
        <x:price_slider-card />
    </div>
    <div class="more-categories">
        <h4>More Job Categories In Your Area</h4>
        <div class="categories-list">
            <ul class="categories">
                @if($suggestedJobs !== null && count($suggestedJobs) > 0)
                @foreach ($suggestedJobs->unique('category_id') as $job)
                <li>{{$job->category->name}}</li>
                <ul>
                    @php
                    $jobsInCity = $job->category->jobs->where('city', $city);
                    @endphp
                    @if($jobsInCity->count() > 0)
                    @foreach ($jobsInCity as $category_jobs)
                    <li><a href="#" class="category-job-link">{{$category_jobs->job_title}}</a></li>
                    @endforeach
                    @else
                    <p>No Categories Available!</p>
                    @endif
                </ul>
                @endforeach
                @elseif($suggestedJobs !== null && count($suggestedJobs) === 0)
                <div class="no-jobs-message">
                    <p>No Categories Found In Your Area.</p>
                </div>
                @else
                <div class="no-jobs-message">
                    <p>Error: Unable to fetch categories results.</p>
                </div>
                @endif
            </ul>
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
                        <p><a href="{{ route('jobDetails', ['id' => $job->id]) }}">{{ $job->job_title }}</a></p>
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
                    <button>Job Details</button>
                    <button>Contact Me</button>
                </div>
            </div>
        </div>
        @endforeach
        @elseif($searchResult !== null && count($searchResult) === 0)
        <div class="no-jobs-message">
            <p>No Jobs Found In Your Area.</p>
            @if(session('error'))
            <p>{{session('error')}}</p>
            @endif
        </div>
        @else
        <div class="no-jobs-message">
            <p>Error: Unable to fetch Jobs results.</p>
        </div>
        @endif
    </div>
</div>
@endsection