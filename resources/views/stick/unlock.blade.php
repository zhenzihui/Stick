@extends('layouts.app')

@section('head')
    <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=22652046df5498896643171b9fc9108a"></script>
    <script type="text/javascript" src="http://cache.amap.com/lbs/static/addToolbar.js"></script>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<style>

</style>
    <script type="text/javascript">

        var map, geolocation;
        //加载地图，调用浏览器定位服务
        map = new AMap.Map('container', {
            resizeEnable: true
        });
        map.plugin('AMap.Geolocation', function() {
            geolocation = new AMap.Geolocation({
                enableHighAccuracy: true,//是否使用高精度定位，默认:true
                timeout: 10000,          //超过10秒后停止定位，默认：无穷大
                buttonOffset: new AMap.Pixel(10, 20),//定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
                zoomToAccuracy: true,      //定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
                buttonPosition:'RB'
            });
            map.addControl(geolocation);
            geolocation.getCurrentPosition();
            AMap.event.addListener(geolocation, 'complete', onComplete);//返回定位信息
            AMap.event.addListener(geolocation, 'error', onError);      //返回定位出错信息
        });
        //解析定位结果
        function onComplete(data) {
            lat= data.position.getLat();
            lng=data.position.getLng();
            document.getElementById('start_location').value=lng+","+lat;
        }
        //解析定位错误信息
        function onError(data) {
           //location.reload(true);
            document.getElementById('start_location').value = 112.904233+","+28.209581;
        }

        $(document).ready(function () {
            $("#content").hide();
            $('body').css("background-color",'white');
            var t=setTimeout("show()",5000);

        });
        function show() {
            $("#content").show();
            $("#launcher").hide();
            $('body').css("background-color",'');
            
        }

    </script>
@endsection
@section('content')

    <div class="container" id="launcher">
        <div class="row">
            <div class="media" align="center">
                <img src="{{url('back.jpg')}}"  height="100%" width="95%" style="margin-top: 85px"/>
            </div>
        </div>
    </div>
<div class="container" id="content"><div class="row">
        <div class="col-md-4"></div>
<div class="col-md-4">
    <div class="panel panel-heading">使用该拐杖
    </div>
    <div class="panel panel-content">
        <form action="{{url('unlock')}}" method="post">
            <div class="form-gro    up">
            <span for="id">解锁编号如下的拐杖？</span>

                <input type="hidden" id="id" name="id" value="{{$stick->id}}" class="form-control" />
            </div>
            <div class="form-group" align="center">
                                <span style="color: #ffda00;font-size: 50px;font: 'Fira Code Light'">
                    {{$stick->id}}
                </span>
            </div>
            <div class="form-group">
            <input type="submit" class="btn-submit" style="color: black"  value="解锁使用"/>
            <input type="hidden" id="start_location" name="start_location"/>
            </div>

        </form>
    </div>
    </div>

    </div>
</div>
        <div class="col-md-4"></div>


    @endsection
