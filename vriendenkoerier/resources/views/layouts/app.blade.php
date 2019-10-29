<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Title -->
        <title>{{ config('app.name', 'Vrienden Koerier') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Montserrat&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <main>
            @yield('content')
        </main>
    </body>

</html>
