@extends('layout.layout')

@section('title', 'Pending Jobs')
@section('content')
@if($jobsPendingList)
<div class="notification-container doer-booking-list">
    @foreach($jobsPendingList as $jobPending)
    @if($jobPending->pending == 1)
    <div class="notifications-container-booking ">
        <div class="notification-card">
            <p>{{$jobPending->id}}</p>
            <p class="date">Date: {{ $jobPending->created_at->format('d M Y') }}</p>
            <p class="title">{{ $jobPending->customer_name }}</p>
            <a class="call" href="tel:{{ $jobPending->customer_number }}"><span><i class="fa-solid fa-phone"></i></span>call doer</a>
        </div>
        <div class="job-booking">
            <p>Job Completed?</p>
            <div class="decisions-botton">
                <form action="{{route('booked-job-completed', ['booked_job_id'=>$jobPending->id])}}" method="POST">
                    <!-- {{ csrf_field() }} -->
                    @csrf
                    <input type="hidden" name="state" value="true">
                    <button type="submit" name="action" value="Accept" class="yes">Yes</button>
                </form><br />
                <form action="{{route('booked-job-by-doer-delete', ['booked_job_id'=>$jobPending->id])}}" method="POST">
                    <!-- {{ csrf_field() }} -->
                    @csrf
                    <button type="submit" name="action" value="Decline" class="delete">Delete</button>
                </form>

            </div>

        </div>
    </div>
    @endif
    @endforeach
</div>
@else
<div class="no-pending-jobs">
    <p>
        No Pending Jobs found!
    </p>
</div>
@endif
@endsection