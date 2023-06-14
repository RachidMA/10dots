@extends('layout.layout')

@section('title', 'About Us')

@section('content')
<div class="artboard">
    <h2>MEET OUR AMAZING TEAM MEMEBERS</h2>
    <div class="about-us-text">
        <p class="about-text">We are a team of five junior web developers who have come together to create the 10Dots platform as our final course project. This project began as a way to answer a simple question: “How can we connect people who need help with those who are willing to help?" 10Dots is here to bridge the gap and encourage smooth partnerships, whether you're a freelancer looking for exciting projects or a business in need of top-notch talent.</br></br>At 10Dots, we believe in using the power of technology to bring people closer and make their lives easier. Our platform provides a seamless experience for individuals and businesses to connect with skilled professionals and build potentially meaningful connections.</br></br>Our team's core values revolve around quality, reliability, and exceptional customer service. Join us on this exciting journey as we continue to expand and empower individuals and businesses worldwide. Together, let's unlock endless possibilities and make your visions come to life. </br></br>Thank you for choosing 10Dots!</p>
    </div>
    @foreach($admins as $index=>$admin)
    <x:about_us-card :admin='$admin' :index='$index' />
    @endforeach
</div>
@endsection