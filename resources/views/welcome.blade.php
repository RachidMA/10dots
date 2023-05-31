@extends ('layout.layout')

@section('content')


<div id="big_circ"></div>
<div class="landing_row_1">
    <div class="welcome_div">
        <h1 id="welcome">Help You Can trust <span>..........</span></h1>
        <h2 id="subwelcome">Find a <span>10 Dots</span> Doer Near You</h2>
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
            <input type="submit" value="Submit">
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


@endsection