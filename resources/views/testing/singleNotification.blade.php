@extends('layout.layout')

@section('Read Single Notification')


@section('content')
@if($notification->title === 'Booking Request')

<div class="booking-request-list-link">
    <div class="booking-request-container">
        <p>
            You have a new booking request.
        </p>
        <div class="booking-request-page">
            <a href="{{route('pending-booking-request', ['id'=>Auth::user()->id])}}">GO BOOKING REQUEST PAGE</a>
        </div>
    </div>
</div>

@else
<div class="notification-container">
    <p class="notification-date">Date:{{$notification->created_at->format('d M Y')}}</p>
    <p class="notification-title">{{$notification->title}}</p>
    <p class="notification-message">{{$notification->message}}</p>
</div>
@endif

@endsection