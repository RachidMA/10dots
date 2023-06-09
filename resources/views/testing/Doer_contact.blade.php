@extends ('layout.layout')

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        <h3>
            {!! \Session::get('success') !!}
        </h3>
    </div>
@endif

<div id="content">
    <h1>Contact</h1>

    <form action="{{ route('contact.submitForm') }}" method="POST" class="contact">
        @csrf
        <input type="hidden" name="job_id" value="{{ $jobId }}">
        <p>
            <label for="name" class="icon-user"> Name
                <span class="required">*</span>
            </label>
            <input type="text" name="name" id="name" required="required" placeholder="Your Name" />
        </p>
        <p>
            <label for="email" class="icon-envelope"> E-mail address
                <span class="required">*</span>
            </label>
            <input type="email" name="email" id="email" placeholder="I promise I hate spam too!" required="required" />
        </p> 
        <p>
            <label for="phone" class="icon-phone"> Phone</label>
            <input type="phone" name="phone" id="phone" placeholder="Phone Number" />
        </p>
        <p>
            <label for="date" class="icon-calendar"> Date</label>
            <input type="date" name="date" id="date" />
        </p>
        <p>
            <label for="message" class="icon-comment"> Message
                <span class="required">*</span>
            </label>
            <textarea name="message" id="message" placeholder="Your message here and I'll answer as soon as possible" required="required"></textarea>
        </p>
        <p class="indication">Fields with
            <span class="required"> * </span>are required</p>

        <input type="submit" value="Send this mail!" />
    </form>
</div>



@endsection