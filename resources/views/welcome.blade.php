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

        <div>
            <label for="job">I'm looking for a</label>
            <input type="text" id="job" name="job" placeholder="cleaner, plumber, baby-sitter"><br>
        </div>

        <div>
            <label for="country">in</label>
            <input type="text" id="country" name="country" placeholder="Country">


            <label for="city">in this city:</label>
            <input type="text" id="city" name="city" placeholder="City"><br>
        </div>


        <div>
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
    <div class="landing_category">
        <div class="cat_img">

        </div>
        <div class="cat_info">
            <h5>
                Job Title
            </h5>
            <p>
                2700 completed tasks | 188 Doers
            </p>
            <button>
                Book job
            </button>
        </div>
    </div>
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