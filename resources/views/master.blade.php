<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
</head>
<body>

    @include('_inc.menu')

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
</body>
</html>