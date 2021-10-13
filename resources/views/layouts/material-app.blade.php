<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            Student Dashboard
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href='https://mmwebfonts.comquas.com/fonts/?font=myanmar3' />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link href="{{asset('css/show/material-kit.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/show/material-custom.min.css')}}" rel="stylesheet" />
        @stack('styles')
    </head>
    <body class="index-page sidebar-collapse">
        @php($site_name = config('common.site'))
        <nav class="navbar navbar-expand-lg bg-custom">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="#0"><img src="{{asset(get_config('otp-login-setting.logo'))}}" alt="" style="width: 30px;">&nbsp;&nbsp;&nbsp;{{get_config('site-setting.dashboard_header')}}</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        @can('admin.dashboard')
                        <li class="active nav-item">
                            <a href="{{route('admin.dashboard')}}" class="nav-link"> Admin</a>
                        </li>
                        @endcan
                        <li class="dropdown nav-item">
                            <a href="#pablo" class="dropdown-toggle nav-link" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('logout') }}" class="dropdown-item">{{ __('Logout') }}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
            @yield('content')

        <footer class="footer" data-background-color="black">
            <div class="container">
                <div class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script> by
                    <a href="https://blueplanet.com.mm/" target="_blank" class="text-blue" style="color: #337ab7 !important;">Blue Planet</a>
                </div>
            </div>
        </footer>
        <script src="{{asset('js/show/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/show/popper.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/show/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/show/material-kit.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/show/print.js')}}" type="text/javascript"></script>
        @stack('scripts')
    </body>
</html>
