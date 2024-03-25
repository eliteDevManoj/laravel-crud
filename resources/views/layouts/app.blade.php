<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script>
        window.APP_URL = "{{ config('app.app_url') }}";
        window.API_URL = "{{ config('app.api_url') }}";
    </script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
    <body>
        <div id="app">
        
            @yield('content')
              
        </div>
    </body>
</html>
