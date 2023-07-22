@extends('layout.layout')

@section('title', 'Pending Booking Request Page')

@section('content')

@if($jobBookingList)
<div class="notification-container doer-booking-list">
    @foreach($jobBookingList as $jobBooking)
    @if($jobBooking->pending == 0)
    <div class="notifications-container-booking ">
        <div class="notification-card">
            <p>{{$jobBooking->id}}</p>
            <p class="date">Date: {{ $jobBooking->created_at->format('d M Y') }}</p>
            <p class="title">{{ $jobBooking->customer_name }}</p>
            <a class="call" href="tel:{{ $jobBooking->customer_number }}"><span><i class="fa-solid fa-phone"></i></span>call doer</a>
        </div>
        <div class="loading">
            <i class="fas fa-spinner fa-spin fa-lg"></i> Pending...
        </div>
        <div class="booking-decision">
            <form action="{{route('confirm-booking', ['booking_id'=>$jobBooking->id])}}" method="POST">
                <!-- {{ csrf_field() }} -->
                @csrf
                <input type="hidden" name="state" value="true">
                <button type="submit" name="action" value="Accept" class="accept">Accept</button>
            </form><br />
            <form action="{{route('decline-booking', ['booking_id'=>$jobBooking->id])}}" method="POST">
                <!-- {{ csrf_field() }} -->
                @csrf
                <button type="submit" name="action" value="Decline" class="decline">Decline</button>
            </form>
        </div>
    </div>
    @endif
    @endforeach
</div>
@else
<div class="no-pending-jobs">
    <p>
        No Job booking Requests Found!
    </p>
</div>
@endif

@endsection