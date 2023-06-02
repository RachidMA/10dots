@extends ('layout.layout')

@section('content')

<!-- =======================JEAN========================= -->
<div class="container py-4">
<div class="p-5 text-center " style="background-color:#C8C2BC"; background-size: cover; background-position: center;">
<form action="{{ route('contact.store') }}" method="POST" class="contact-us">
@csrf
    <div class="mb-3">
    <input class="form-control" id="name" type="text" name="name" placeholder="Name" />
    <!-- Error handling -->
    @if ($errors->has('name'))
        <div class="error">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>

    <div class="mb-3">
    <input class="form-control" id="emailAddress" name="email" type="email" placeholder="Email" />
    <!-- Error handling -->
    @if ($errors->has('email'))
        <div class="error">
            {{ $errors->first('email') }}
        </div>
        @endif
    </div>

    <div>
    <textarea id="message" class="form-control rounded border-white mb-3 form-text-area" name="message" rows="5" cols="30" placeholder="Message"></textarea>
    <!-- Error handling -->
    @if ($errors->has('message'))
        <div class="error">
            {{ $errors->first('message') }}
        </div>
        @endif
    </div>

    <button class="btn btn-primary" type="submit">Submit</button>
</form>
</div>


@endsection