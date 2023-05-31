@extends ('layout.layout')

@section('content')


<div id="big_circ"></div>
<div class="landing_row_1">
    <h1 id="welcome">Help You Can trust <span>..........</span></h1>
    <h2 id="subwelcome">Find a <span>10 Dots</span> Doer Near You</h2>
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

@endsection