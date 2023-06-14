@extends('layout.layout')

@section('title', 'About Us')

@section('content')
<div class="artboard">
    <h2>MEET OUR AMAZING TEAM MEMEBERS</h2>
    <div class="about-us-text">
        <p class="about-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat eaque magnam itaque iste voluptates officiis, reiciendis tempore sunt vero repellendus voluptatum autem, ad architecto voluptas nemo ratione. Fuga magnam incidunt itaque delectus reprehenderit labore, recusandae quia dolores, maxime ipsam optio consectetur! Unde ipsam commodi tempore? Est fugiat illo suscipit porro?</p>
    </div>
    @foreach($admins as $index=>$admin)
    <x:about_us-card :admin='$admin' :index='$index' />
    @endforeach
</div>
@endsection