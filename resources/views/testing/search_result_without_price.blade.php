<!-- RACHID:THIS IS WILL BE THE FIRST VIEW TO SHOW SEARCH Results
PLUS THE PRICE SLIDER -->


@extends ('layout.layout')

@section('content')

<h1>Jobs Search Reasults</h1>


<div class="container-reasults">
    <div class="price-slider">
        <x:price_slider-card />
    </div>
    <div class="more-categories">
        <h4>More Job Categories In Your Area</h4>
        <div class="categories-list">
            <ul class="categories">
                <li>Job Category-1</li>
                <li>Job Category-2</li>
                <li>Job Category-3</li>
                <li>Job Category-4</li>
                <li>Job Category-5</li>
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
                <h5>
                    {{$job->job_title}}
                </h5>
                <p>
                    2700 completed tasks | 188 Doers
                </p>
                <div class="buttons-container">
                    <button>
                        Job Details
                    </button>
                    <button>
                        Contact Me
                    </button>
                </div>

            </div>
        </div>

        @endforeach
    </div>

</div>
@elseif($searchResult !== null && count($searchResult) === 0)
<div class="no-jobs-message">
    <p>No job results found.</p>
</div>
@else
<div class="no-jobs-message">
    <p>Error: Unable to fetch job results.</p>
</div>
@endif




@endsection