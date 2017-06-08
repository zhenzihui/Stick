<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    @yield('head')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <title>@yield('title')</title>
</head>
<body>
@yield('content')
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=22652046df5498896643171b9fc9108a"></script>
<!--引入UI组件库（1.0版本） -->
<script src="//webapi.amap.com/ui/1.0/main.js"></script>
@yield('mapjs')
<script src="{{ asset('js/app.js') }}"></script>

</body>


</html>