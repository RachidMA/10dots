<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10 dots</title>
    @vite(['resources/scss/app.scss'])
</head>

<body>
    <div class="container">

        @include("site.header")

        <div class="wrapper">
            @yield ('content')
        </div>

        @include("site.footer")

    </div>
</body>

</html>