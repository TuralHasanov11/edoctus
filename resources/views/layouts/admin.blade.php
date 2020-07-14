<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LaravelAdmin') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

   
    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="sb-nav-fixed admin-body">
        <div id="app" class="admin">
            @include('inc.admin.topnav')
            <div id="layoutSidenav">
                @include('inc.admin.sidenav')
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </main>
                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid"></div>
                    </footer>
                </div>
            </div>
        </div>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'text-editor' );
    </script>
</body>
</html>
