<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login to Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{asset(get_config('otp-login-setting.logo'))}}"/>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body oncontextmenu="return false">

        @yield('content')

        @stack('before-scripts')
        <script  src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="{{asset('js/otp-login/main.min.js')}}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        @stack('after-scripts')

    </body>
</html>
