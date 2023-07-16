@extends('layout.layout')

@section('title', 'Notifications Page')

@section('content')


<div class="notifications-container">
    @if($notifications->count()>0)
    <div class="notifications">
        @foreach($notifications as $notification)
        <x:testing-components.doerNotification-card :notification='$notification' />
        @endforeach
    </div>
    @else
    <div class="no-notification">
        <p>No Notification Available</p>
    </div>
    @endif
</div>
@endsection