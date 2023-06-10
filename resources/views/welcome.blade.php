@extends ('layout.layout')

@section('content')
<div id="big_circ"></div>

<!-- RACHID:ADDED SUCCESS AND ERROR MESSAGES SECTION -->
<div class="container welcome-error">
    @if(session('message'))
    <!-- Success Alert -->
    <div class="alert alert-success alert-dismissible fade show w-50">
        <strong>Success!</strong> {{session('message')}}.
        @if(Auth::user())
        <a href="{{route('jobs.userDashboard', ['name'=>Auth::user()->name])}}" class="btn btn-primary  h-100 rounded-lg w-25  mx-4 text-light">Go To Dashboard</a>
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <!-- Access Denied Alert -->
    @elseif(session('error'))
    <div class="alert alert-danger alert-dismissible fade show w-50">
        <strong>Error!</strong> {{session('error')}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
</div>

<div class="landing_row_1">
    <!-- RACHID:ADD MESSAGE SECTION -->
    @if(session('message'))
    <!-- Success Alert -->
    <div class="container alert alert-success alert-dismissible fade show w-50">
        <strong>Success!</strong> {{session('message')}}.
        @if(Auth::user())
        <a href="{{route('jobs.userDashboard', ['name'=>Auth::user()->name])}}" class="btn btn-primary  h-100 rounded-lg w-25  mx-4 text-light">Go To Dashboard</a>
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <!-- Access Denied Alert -->
    @elseif(session('error'))
    <div class="container alert alert-danger alert-dismissible fade show w-50">
        <strong>Error!</strong> {{session('error')}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <!-- =================================== -->
    <div class="welcome_div">
        <h1 id="welcome">Help You Can trust <span>..........</span></h1>
        <h2 id="subwelcome">Find a <span>10 Dots</span> Doer Near You <span class="material-symbols-outlined">conditions</span></h2>
    </div>
</div>
<div class="landing_row_2">
    <form action="/search-job" method="post">
        @csrf

        <div class="Search_section">
            <label for="job">I'm looking for a</label>
            <input type="text" id="job" name="job" placeholder="cleaner, plumber, baby-sitter"><br>
        </div>

        <!-- <div>
            <label for="country">in</label>
            <input type="text" id="country" name="country" placeholder="Country">


            <label for="city">in this city:</label>
            <input type="text" id="city" name="city" placeholder="City"><br>
        </div> -->
        <x:testing-components.countries_cities-card :countries='$countries' />

        <div class="Search_section">
            <!-- <span class="material-symbols-outlined"> -->
            <input type="submit" value="search">
            <!-- </span> -->
        </div>
    </form>
</div>
<div class="landing_row_3">
    <h3>Get started</h3>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas eum consectetur nostrum. Odit velit sint iure dolorem eaque impedit non at? Dolorem hic quaerat, ad possimus consequuntur dicta animi placeat, optio repellendus officiis commodi distinctio voluptate inventore modi autem eius veritatis quae quam doloremque ipsum totam expedita? Dicta nemo itaque, eos officia voluptatum ipsa architecto exercitationem placeat? Harum, sed quam!</p>
    <div class="helpout">
        <h4>Want to help out instead?</h4>
        <button>Become a Doer</button>
    </div>
</div>
<div class="landing_row_4">
    <h3>Top tasks</h3>
    @if($featuredJobs)
    @foreach($featuredJobs as $job_review)
    <div class="landing_category">
        <div class="cat_img">
            <img src="/images/{{$job_review[0]->job->image_url ? $job_review[0]->job->image_url : 'default-image.jpg'}}" alt="">
        </div>
        <div class="cat_info">
            <h4>
                {{$job_review[0]->job->category->name}}
            </h4>
            <h6>{{$job_review[0]->job->job_title}}</h6>
            <div class="rating">
                <div class="rate">
                    <input type="radio" id="star5_{{ $job_review[0]->job->id }}" name="rating_{{ $job_review[0]->job->id }}" value="5" {{ $job_review[0]->rating == 5 ? 'checked' : '' }} />
                    <label for="star5_{{ $job_review[0]->job->id }}" title="text">5 dots</label>

                    <input type="radio" id="star4_{{ $job_review[0]->job->id }}" name="rating_{{ $job_review[0]->job->id }}" value="4" {{ $job_review[0]->rating == 4 ? 'checked' : '' }} />
                    <label for="star4_{{ $job_review[0]->job->id }}" title="text">4 dots</label>

                    <input type="radio" id="star3_{{ $job_review[0]->job->id }}" name="rating_{{ $job_review[0]->job->id }}" value="3" {{ $job_review[0]->rating == 3 ? 'checked' : '' }} />
                    <label for="star3_{{ $job_review[0]->job->id }}" title="text">3 dots</label>

                    <input type="radio" id="star2_{{ $job_review[0]->job->id }}" name="rating_{{ $job_review[0]->job->id }}" value="2" {{ $job_review[0]->rating == 2 ? 'checked' : '' }} />
                    <label for="star2_{{ $job_review[0]->job->id }}" title="text">2 dots</label>

                    <input type="radio" id="star1_{{ $job_review[0]->job->id }}" name="rating_{{ $job_review[0]->job->id }}" value="1" {{ $job_review[0]->rating == 1 ? 'checked' : '' }} />
                    <label for="star1_{{ $job_review[0]->job->id }}" title="text">1 dot</label>
                </div>
            </div>
            <p>
                {{$job_review[0]->job->address}} | {{ $job_review[0]->job->country }}, {{$job_review[0]->job->city}}
            </p>
            <a href="{{route('jobDetails', ['id'=>$job_review[0]->job->id])}}">Book job</a>
        </div>
    </div>
    @endforeach

    @else
    <h5>No Jobs</h5>
    @endif

</div>

<div class="landing_row_5">
    <h3>The 10 Dots Process is easy</h3>
    <div class="orange_steps">
        <div class="steps_div">
            <div class="step">
                <span class="material-symbols-outlined">draw</span>
                <h4>sign up</h4>
                <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi blanditiis reprehenderit culpa esse quibusdam suscipit corrupti molestias labore ut eius?</P>
                <span class="material-symbols-outlined">Counter_1</span>
            </div>
            <div class="step">
                <span class="material-symbols-outlined">group_add</span>
                <h4>Book a Doer</h4>
                <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi blanditiis reprehenderit culpa esse quibusdam suscipit corrupti molestias labore ut eius?</P>
                <span class="material-symbols-outlined">Counter_2</span>
            </div>
            <div class="step">
                <span class="material-symbols-outlined">grain</span>
                <h4>Give your Dots</h4>
                <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi blanditiis reprehenderit culpa esse quibusdam suscipit corrupti molestias labore ut eius?</P>
                <span class="material-symbols-outlined">Counter_3</span>
            </div>
        </div>
    </div>
</div>


@endsection