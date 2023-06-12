@extends ('layout.layout')

@section('content')
<div id="big_circ"></div>


<div class="landing_row_1">

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
    <h3>Why 10 dots?</h3>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas eum consectetur nostrum. Odit velit sint iure dolorem eaque impedit non at? Dolorem hic quaerat, ad possimus consequuntur dicta animi placeat, optio repellendus officiis commodi distinctio voluptate inventore modi autem eius veritatis quae quam doloremque ipsum totam expedita? Dicta nemo itaque, eos officia voluptatum ipsa architecto exercitationem placeat? Harum, sed quam!</p>
    <div class="helpout">
        <h4>Want to help out instead?</h4>
        <button>Become a Doer</button>
    </div>
</div>
<div class="landing_row_4">
    <h3>Top Doers</h3>
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
    <div class="orange_steps">
        <h3 class = "why10dots">The 10 Dots Process is Easy!</h3>
        <div class="steps_div">
            <div class="step">
                <span class="material-symbols-outlined">draw</span>
                <h4>Sign Up</h4>
                <P>Join 10 dots today and start earning money doing the things you already do! Or need help with a certain task? Book a Doer in your area.</P>
                <span class="material-symbols-outlined">Counter_1</span>
            </div>
            <div class="step">
                <span class="material-symbols-outlined">group_add</span>
                <h4>Book a Doer</h4>
                <P>Search for an available Doer in your area and schedule an appointment. We have people all over the world ready to help in a wide range of categories.</P>
                <span class="material-symbols-outlined">Counter_2</span>
            </div>
            <div class="step">
                <span class="material-symbols-outlined">grain</span>
                <h4>Give Your Dots</h4>
                <P>After your task has been completed, leave your Doer an honest review. This helps our Doers earn commission and our Users find the best help in their area.</P>
                <span class="material-symbols-outlined">Counter_3</span>
            </div>
        </div>
    </div>
</div>


@endsection