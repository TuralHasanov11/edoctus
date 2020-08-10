<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="shortcut icon" href="https://00e9e64bac3249d3444c5cadc72169931c89604e2cf75b2479-apidata.googleusercontent.com/download/storage/v1/b/medicusv1.appspot.com/o/images%2Flogo_2.PNG?qk=AD5uMEu_zMxij_4hihzACXfBmjk7SZRSVo3ojb9SPKKnRoHjhZEE0s-mxOxZDtUZwTTRm9p4LEf8RspyQvLPk6V6QmW56KqGPIVrInvm-kylkM9xtQjeMqG6sD4UFAZiODVNT7pMsnpJ6jPVQ11eqGbJGOXXtyCabniiwTrG-gc8w_dm4-SHv8vKnhi72zclceXwNGv_PlJJN6BgK_ac5DReDuu1lzxaDSLosBTP9LDRbjnYXWYv6E1J0RgvxT48rCx5DzGwVsGaXcjSdpeEFgdiZp93Rs4-LJy5SFXKCqA6avztWJnWENVqZInL5WqUfVQjjnbotHhZVgMtncb4GqPNK0jSLmjwUfpDaLttIKGMBWQwJsZN55ulGy31KWPoM5g6MiymLl3oYHebnX9FHJohUVr0395-rLalB3JF5E3UKcT1EM3rEQG-zyn-dZEHw4l-m46JzkvYNDGm-ZKbAJC1Yo_Lc-SINEx_3mXwPH03ZqI3bMkaLXJt3cvF4lduBtB-LAlRabTVfZGpWg0Egc-gaJTqtkxwPIDs3StFmUFJ5F2bBn2QnAqLGk0PjRnMBv6pMnOZfIe0OP6GNRLzJrCXExqvvsmmRw8TSsiXiJwSLinyU6SiIvBr8Y6un8dderZtH1ypGVrDez4DQ3M_XgJEXgQGy2CvVa6-Cuz1HKqgMmVJ8eWWc6z4iDiEruG0nB3XGDw_SUEuhVDl0GkhavZLqtTl7UXnlFrXDHjB6wAGWPywe4fy3wK9bZ5mqxeiNaS4F-Ng8Ao_ePfIVseDXCaeSGlOZVqzp4EKkIe9Lfv8ncWsbWee0C68nhaMIfpZufHspsWCJeoA&isca=1" type="image/png">
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
