@extends('layout.layout')

@section('content')
<div class="loreg_card">

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <input placeholder ="name"id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input placeholder ="email"id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input placeholder ="password"id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input placeholder ="password confirm"id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">


        <button type="submit" class="register btn btn-primary">
                    {{ __('Register') }}
        </button>
    </form>
</div>
@endsection