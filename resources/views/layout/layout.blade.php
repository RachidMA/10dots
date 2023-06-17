<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DoerFinder - Find Skilled Service Providers</title>
    <meta name="description" content="Find skilled service providers for all your needs on 10Dots. From plumbers and electricians to dog walkers and car repair experts, our platform connects you with trusted professionals in your area. Browse through our listings, read reviews, and hire the right person for the job. Simplify your search and get things done with DoerFinder.">
    <meta name="keywords" content="DoerFinder, service providers, professionals, plumbers, electricians, dog walkers, car repair, trusted, reviews, hire, platform">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!--Bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap js -->
    <!-- - responsible for responsive navbar -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>

    <!-- import axios to send the oploaded profile image using javascript -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" defer></script>
    <!-- Add this in your layout file or view  RACHID ================-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CDN LINK FOR ICONS SPECIAL THE ONE USED FOR PROFILE IMAGE UPLOAD ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...your-sha512-hash..." crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-...your-sha512-hash..." crossorigin="anonymous" />
    <!-- fontawsome kit link -->
    <script src="https://kit.fontawesome.com/0b78c4645d.js" crossorigin="anonymous"></script>
    <!-- Website favicon -->
    <link rel="icon" type="image/x-icon" href="/icons/favicon.ico">
    <!- <!-- Scripts -->
        @vite(['resources/js/app.js'])

</head>

<body>
    <div class="css_container">
        @if (\Session::has('success'))
        <div class="alert" id="alert-message">
            <h4>{!! \Session::get('success') !!}</h4>
            <button class="btn btn-primary success-ok">OK</button>
        </div>
        @endif
        @include("layout.header")

        <div class="css_wrapper">
            @yield ('content')
        </div>

        @include("layout.footer")

    </div>
</body>

</html>