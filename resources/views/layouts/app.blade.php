<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="shortcut icon" href="https://firebasestorage.googleapis.com/v0/b/medicusv1.appspot.com/o/images%2Flogo_2.PNG?alt=media&token=78982f6c-1bbc-45e0-aa2b-6af385e7ef17" type="image/png">
    <!-- Scripts -->
    <script src="{{env('APP_URL')}}js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{env('APP_URL')}}css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app" class="bg-white">
        
        @include('inc.header')
        @yield('content')
        @include('inc.footer')
    </div>
</body>
</html>
