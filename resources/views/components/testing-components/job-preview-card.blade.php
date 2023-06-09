@props(['job', 'doer'])



<!-- ==================== -->

<div class=" category" id="{{$job->id}}">
    <div class="cat_img job-image">
        <img class="card-img-top" src=" /images/{{$job->image_url}}" alt="Card image cap">
    </div>
    <div class="cat_info">
        <div class="job-informations">
            <div class="job-title">
                <h4 class="title">Doer Profile</h4>
            </div>
            <div class="job-info-text">
                <h5>{{ $job->first_name }} {{ $job->last_name }}</h5>
                <p>Address: {{ $job->address }}</p>
                <div class="job-country-city">
                    <p class="country"> {{ $job->country }}</p>
                    <p>{{ $job->city }}</p>
                </div>
                @if ($doer->jobs->count() > 1)
                Total Jobs: {{ $doer->jobs->count() }} Jobs
                @elseif ($doer->jobs->count() == 1)
                Total Jobs: One Job
                @else
                None
                @endif
                <p>Total Spams: {{$doer->spam_reports}}</p>
            </div>
        </div>
        <div class="contact-me">
            <!-- //Jean=== -->
            <a href="{{ route('contact.show', ['jobId' => $job->id]) }}">Contact Me</a>
        </div>
    </div>
</div>

<!-- ================ -->

</div>
</div>