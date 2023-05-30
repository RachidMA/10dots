@extends ('layout.layout')

@section('content')
<h1>Welcome to 10dots</h1>
<!-- RACHID: I ADDED THIS LINK TO WORK ON CRAETE JOB FORM(WILL BE MOVE LATE TO THE DOES PAGE) -->
<div class="create-job">
    <a href="{{route('create-job')}}">Create Job</a>
</div>
@endsection