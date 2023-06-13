@extends ('layout.layout')

@section('content')

<div class="loreg_card">
    <div class="big_circ_2"></div>
<h1>Hello, how can we help you?</h1>
@if (\Session::has('success'))
    <div class="alert">
        <h3>{!! \Session::get('success') !!}</h3>
        <a href="{{ route('homepage') }}" class="btn btn-primary">Home</a>
    </div>
@endif

<form action="{{ route('contact.store') }}" method="POST" class="contact-us">
@csrf
<div class="formInput">

    <input type="text" id="name" type="text" name="name" placeholder="Name" required="required">
    @if ($errors->has('name'))
        <div class="error">
            {{ $errors->first('name') }}
        </div>
        @endif

    <input type="email" id="emailAddress" name="email" type="email" placeholder="Email" required="required" >
    @if ($errors->has('email'))
        <div class="error">
            {{ $errors->first('email') }}
        </div>
        @endif

    <textarea name="message" id="message" placeholder="Your message here and I'll answer as soon as possible" required="required"></textarea>
    @if ($errors->has('message'))
        <div class="error">
            {{ $errors->first('message') }}
        </div>
        @endif
    </div>

    <input type="submit" value="Submit" id="input-submit">
</form>
</div>

</div>

@endsection