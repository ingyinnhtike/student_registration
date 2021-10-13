<!doctype html>
<html lang="UTF-8">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="{{asset(get_config('otp-login-setting.logo'))}}"/>
        <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
    </head>

    <body class="block">
        @yield('content')

        <script src="{{asset('js/app.js')}}"></script>

        @stack('scripts')
    </body>
</html>
