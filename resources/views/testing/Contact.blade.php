@extends ('layout.layout')

@section('content')
    <!-- <li class="nav-item">
    <a class="nav-link" href="{{route('contact-us')}}">Contact Us</a>
</li> -->
<!-- =======================JEAN========================= -->
<div class="container py-4">
<div class="p-5 text-center " style="background-color:#C8C2BC"; background-size: cover; background-position: center;">
<form action="{{ route('contact-us') }}" method="POST" class="contact-form">
@csrf
    <div class="mb-3">
    <input class="form-control" id="name" type="text" name="name" placeholder="Name" />
    </div>

    <div class="mb-3">
    <input class="form-control" id="emailAddress" name="email" type="email" placeholder="Email" />
    </div>

    <div>
    <textarea id="message" class="form-control rounded border-white mb-3 form-text-area" name="message" rows="5" cols="30" placeholder="Message"></textarea>
    </div>

    <button class="btn btn-primary" type="submit">Submit</button>
</form>
</div>


@endsection