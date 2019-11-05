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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Montserrat&display=swap" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->

    </head>


    <body>
        <main>
            @yield('content')
        </main>
    </body>

</html>
