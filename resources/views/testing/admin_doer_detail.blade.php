@extends('layout.layout')

@section('title', 'Doer Profile')

@section('content')
<div class="card-deck" id="card-deck">
    <!-- ============ -->
    @if($job && $doer)
    <x:testing-components.job-preview-card :job="$job" :doer="$doer" />
    @else
    <div class="no-jobs-message">
        <p>No Doer results found.</p>
    </div>
    @endif

    <!-- ============ -->

</div>


@endsection