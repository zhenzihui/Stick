<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
        <style>
            .center{
                position: absolute;
                top: 50%;
                left: 50%;
                width:50%;
                height:30%;
                padding:20px;
                text-align:center;
                color:#fff;
                transform: translate(-50%, -50%);
            }
            .pill
            {
              border-radius: 10px;
                background: #ffda00;
                border: 0;
                color: black;


            }
            .yellowText
            {
                color: #ffda00;
            }
            .btn-tool
            {
                width: 60px;height: 30px;border-radius: 15px;color: black;
            }
            .btn-submit
            {
                width: 100%;
                height: 50px;
                background-color: #ffda00;
                color: black;
                border: 0;
            }



        </style>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="" rel="stylesheet">
    @yield('head')
</head>
<body style="height: 100%" >
    <div id="app" style="height: 100%">
        <nav class="navbar navbar-default navbar-static-top" style="background-color: dimgrey;">
            <div class="container" style="margin-top: 10px">


                <div class="navbar-header" style="position: relative">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" style="border: hidden" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar" style="background-color: white"></span>
                        <span class="icon-bar" style="background-color: white"></span>
                        <span class="icon-bar" style="background-color: white"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand center" style="color: #ffda00"  href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li ><a style="color: white;" href="{{ route('login') }}">登录</a></li>
                            <li><a style="color: white;" href="{{ route('register') }}">注册</a></li>
                        @else
                            <li>
                                <a style="color: white;" href="{{url('home')}}">管理面板</a>
                            </li>
                            <li>
                            <a class="text-white" style="color: white;" href="{{url('setrelation')}}">关联{{Auth::user()->role=='user'?'监护人':'使用者'}}</a>
                        </li>
                            <li class="dropdown">
                                <a style="color: white;" href="#" class="dropdown-toggle text-white" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                    <li>
                                        <a style="color: white;" class="text-white" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            退出登录
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                @yield('nav')
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->

</body>
</html>
