@extends ('layout.layout')

@section('content')


<div class="job-main-content">
    <div class="doer-job-details">
        <div class="doer-job-details-card">
            <div class="job-image job-image-guest">
                <img class="card-img-top" src=" /images/{{$job->image_url ? $job->image_url: 'job_default.png'}}" alt="Card image cap">
            </div>
            <div class="job-informations">
                <div class="job-title">
                    <h3 class="title">Job Title: {{ $job->job_title }}</h3>
                </div>
                <div class="job-info-text">
                    <p>{{ $job->first_name }} {{ $job->last_name }}</p>
                    <p>Address: {{ $job->address }}</p>
                    <div class="job-country-city">
                        <p class="country"> {{ $job->country }}</p>
                        <p>{{ $job->city }}</p>
                    </div>
                    @if($job->price)
                    <p class="price">Price: {{$job->price}} €</p>
                    <a href="tel:{{ $job->phone }}" class="phone-number"><span><i class="fa-solid fa-phone fa-shake" style="color: #ffc014;"></i></span>CALL ME</a>
                    @else
                    <p>Price: No Price Was Set</p>
                    @endif
                </div>
                <div class="contact-me job-detail-button">
                    <!-- //Jean=== -->
                    <a href="{{ route('contact.show', ['jobId' => $job->id]) }}" class="email-me"><i class="fa-solid fa-at" style="color: #e2e3e9;"></i>Contact Me</a>
                    <button class="reviewButton">Leave Review</button>
                </div>
            </div>
        </div>
        <div class="job-description">
            <p>Description: {{$job->description}}</p>
        </div>
        <div class="reviews-container">
            @if($reviews)
            @foreach($reviews as $review)
            <div class="rating review-job-detail-page ">
                <div class="review-info">
                    <div class="review-name-icon">
                        <div class="icon-image">
                            <img src="/icons/icon-{{rand(1,4)}}.png" alt="" class="icon-image-display">
                        </div>
                        <h4>{{$review->name}}</h4>
                    </div>
                    <div class="rate">
                        <input type="radio" id="star5_{{ $review->id }}" name="rating_{{ $review->id }}" value="5" {{ $review->rating == 5 ? 'checked' : '' }} disabled />
                        <label for="star5_{{ $review->id }}" title="text">5 dots</label>

                        <input type="radio" id="star4_{{ $review->id }}" name="rating_{{ $review->id }}" value="4" {{ $review->rating == 4 ? 'checked' : '' }} disabled />
                        <label for="star4_{{ $review->id }}" title="text">4 dots</label>

                        <input type="radio" id="star3_{{ $review->id }}" name="rating_{{ $review->id }}" value="3" {{ $review->rating == 3 ? 'checked' : '' }} disabled />
                        <label for="star3_{{ $review->id }}" title="text">3 dots</label>

                        <input type="radio" id="star2_{{ $review->id }}" name="rating_{{ $review->id }}" value="2" {{ $review->rating == 2 ? 'checked' : '' }} disabled />
                        <label for="star2_{{ $review->id }}" title="text">2 dots</label>

                        <input type="radio" id="star1_{{ $review->id }}" name="rating_{{ $review->id }}" value="1" {{ $review->rating == 1 ? 'checked' : '' }} disabled />
                        <label for="star1_{{ $review->id }}" title="text">1 dot</label>
                    </div>
                </div>
                <p>{{$review->comment}}</p>
            </div>
            <!-- <h4>{{$review->name}}</h4>
            <p>{{$review->comment}}</p> -->
            @endforeach
            @else
            <p>No Reviews Available</p>
            @endif
        </div>
    </div>
    <div class="spam-button">
        <a id="reportButton">Report Profile</a>
    </div>
</div>

<div id="reviewFormContainer" class='review'>
    <!-- RACHID:ADD THIS BUTTON TO CLOSE LEAVE REVIEW FORM WHEN CLICKED -->
    <button class="close-button">X</button>
    <form method="POST" action="{{ route ('leaveReview') }}">
        @csrf
        <h1>Leave a review</h1>
        <div class="main-review-form">
            <div class="mb-3 name-email">
                <!-- <label for="name" class="form-label">Your Name</label> -->
                <input type="text" name="name" placeholder="enter your name here" id="name">

                <!-- <label for="name" class="form-label">Your Email</label> -->
                <input type="email" name="email" placeholder="enter your email here" id="email">
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Comments</label>
                <textarea id="textarea" rows="3" cols="25" name="comment" id="comment"></textarea>
            </div>
            <label for="rate" class="form-label">Rate</label>
            <div class="rate">
                <input type="radio" id="star5" name="rating" value="5" />
                <label for="star5" title="text">5 dots</label>

                <input type="radio" id="star4" name="rating" value="4" />
                <label for="star4" title="text">4 dots</label>

                <input type="radio" id="star3" name="rating" value="3" />
                <label for="star3" title="text">3 dots</label>

                <input type="radio" id="star2" name="rating" value="2" />
                <label for="star2" title="text">2 dots</label>

                <input type="radio" id="star1" name="rating" value="1" />
                <label for="star1" title="text">1 dot</label>
            </div>
            <input type="hidden" name="job_id" id="job_id" value="6">

            <div class="submit-button">
                <button type="submit" name="submit" id="submit">Submit</button>
            </div>
        </div>
    </form>
</div>

<div id="reportModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Confirmation</h5>
            <span id="closeModal" class="close">&times;</span>
        </div>
        <div class="modal-body">
            <p>By clicking OK, you are reporting this profile as a spammer.</p>
        </div>
        <div class="modal-footer">
            <button id="cancelButton" class="btn">No</button>
            <form method="POST" action="{{ route('report-spam') }}">
                @csrf
                <input type="hidden" name="job_id" value="{{ $job->id }}">
                <button type="submit" class="btn btn-danger" id="confirmButton">OK</button>
            </form>
        </div>
    </div>
</div>

@endsection