@extends ('layout.layout')

@section('content')



<div class="loreg_card">
@if (\Session::has('success'))
    <div class="alert alert-success">
        <h3>
            {!! \Session::get('success') !!}
        </h3>
        <a href="{{ route('homepage') }}" class="btn btn-primary">Go Back to Home</a>
    </div>
@endif

<div class="container py-4">

<div class="p-5 text-center " style="background-color:#C8C2BC"; background-size: cover; background-position: center;>

<h1>Hello, how can we help you?</h1>

<form action="{{ route('contact.store') }}" method="POST" class="contact-us">
@csrf
<div class="formInput">
    <input type="text" id="name" type="text" name="name" placeholder="Name">
    @if ($errors->has('name'))
        <div class="error">
            {{ $errors->first('name') }}
        </div>
        @endif

    <input type="email" id="emailAddress" name="email" type="email" placeholder="Email">
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