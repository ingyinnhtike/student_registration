<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title',  config('app.name', 'Student Registration Form') )</title>
        <link rel="icon" type="image/png" href="{{asset(get_config('otp-login-setting.logo'))}}"/>
{{--        <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href='https://mmwebfonts.comquas.com/fonts/?font=myanmar3' />
        @if(get_config('form-setting.has_bloodtype'))
        <link rel="stylesheet" type="text/css" href="{{asset('css/patheinfrontend-old.css')}}">
        @else
        <link rel="stylesheet" type="text/css" href="{{asset('css/frontend-old.css')}}">
        @endif
        <link rel="stylesheet" href='https://mmwebfonts.comquas.com/fonts/?font=myanmar3' />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

        @stack('after-styles')
    </head>
    <body>
        <div class="info"><h1>{{get_config('form-setting.heading')}}</h1></div>

            @yield('content')

        @stack('before-scripts')
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
        <script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
        <script>
            var config = {
                routes: {
                    township_search: "{{route('township.search')}}",
                    course_search: "{{route('course.search')}}"
                },
                form_data :{
                    major_limit : "{{get_config('form-setting.major_limit')}}",
                    student_other_name_mm : "{{$studentDetail->name_mm ?? old('other_name_mm')}}",
                    student_other_name_eng : "{{$studentDetail->name_eng ?? old('other_name_eng')}}"
                },
            };
        </script>
        <script type="text/javascript" src="{{asset('js/frontend-old.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
    @stack('after-scripts')
    </body>
</html>
