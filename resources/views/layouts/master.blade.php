<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Napebook | Maial, che social!') }}</title>

    <!-- Custom Font -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')

</head>

<body id="page_top">

    @auth
        @include('layouts.navbar')
    @endauth

    @yield('content')

    @include('layouts.footer')

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js" integrity="sha256-ABVkpwb9K9PxubvRrHMkk6wmWcIHUE9eBxNZLXYQ84k=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

</body>

</html>