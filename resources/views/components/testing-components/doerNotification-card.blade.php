@props(['notification'])

<div class="single-notification " id="{{$notification->status===1 ? 'notification-seen': '' }}">
    <a href="{{route('testing.singleNotification', ['id'=>$notification->id])}}" class="notification-card">
        <p class="notification-date">Date:{{$notification->created_at->format('d M Y')}}</p>
        <p class="notification-title">{{$notification->title}}</p>
        <p class="notification-message">{{$notification->message}}</p>
    </a>
</div>