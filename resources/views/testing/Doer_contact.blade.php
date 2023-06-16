@extends ('layout.layout')

@section('content')

<div class="loreg_card">
    <div class="big_circ_2"></div>
<h1>Contact the Doer</h1>
@if (\Session::has('success'))
    <div class="alert">
        <h3>{!! \Session::get('success') !!}</h3>
        <a href="{{ route('jobDetails', ['id' => $jobId]) }}"class="btn btn-primary">Back to the job details</a>
    </div>
@endif
<form action="{{ route('contact.submitForm') }}" method="POST" class="contact">
    @csrf
        <input type="hidden" name="job_id" value="{{ $jobId }}">
            
            <input type="text" name="name" id="name" required="required" placeholder="Your Name" />
            <input type="email" name="email" id="email" required="required" placeholder="Email"  />
            <input type="phone" name="phone" id="phone" required="required" placeholder="Phone Number" />
            <label for="date">Hire doer for this date:</label>
            <input type="date" name="date" id="date" required="required" />
            <textarea name="message" id="message" placeholder="Your message here and I'll answer as soon as possible" required="required"></textarea>
        
            <input type="submit" value="Submit" />
    </form>
</div>
@endsection