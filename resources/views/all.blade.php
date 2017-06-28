@extends('layouts.app')
@section('head')

@stop
@section('nav')
@include('subNavBar')
@stop
@section('content')
<div style="width: 100%;">
    <div class="form-control"  style="position: absolute;top: 20%;z-index: 45;height: 7%;font-size: larger">
      <img src="{{url('logo.jpg')}}" class="img-circle" height="90%">  “用”智能共享拐杖，享<span style="color: #ffda00">幸福安稳人生</span>>
    </div>
   <div id="map" style="height:100%" >
   </div>
    <div align="center" style="position: absolute;bottom: 5%;z-index: 45;width: 100%;">
        <button id="btn_scan" class="pill" style="height: 50px;width: 100px;border-radius: 25px;background-color: black;color: white">扫码开锁</button>
    </div>
</div>
<script type="text/javascript"
        src="https://webapi.amap.com/maps?v=1.3&key=22652046df5498896643171b9fc9108a"></script>
    <script>
        $("body").height( $(window).height() );
        mapHeight=$("body").height()-$("nav").height()-22;
        $("#map").height(mapHeight);
        //alert($("body").height());
        var geolocation;
        var map = new AMap.Map("map", {
            resizeEnable: true,
            zoom: 16
        });
        map.plugin('AMap.Geolocation', function() {
            geolocation = new AMap.Geolocation({
                enableHighAccuracy: true,//是否使用高精度定位，默认:true
                timeout: 10000,          //超过10秒后停止定位，默认：无穷大
                buttonOffset: new AMap.Pixel(10, 20),//定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
                zoomToAccuracy: true,      //定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
                buttonPosition:'LB'
            });
            map.addControl(geolocation);
            geolocation.getCurrentPosition();
            AMap.event.addListener(geolocation, 'complete', onComplete);//返回定位信息
            AMap.event.addListener(geolocation, 'error', onError);      //返回定位出错信息
        });
        //解析定位结果
        function onComplete(data) {

        }
        //解析定位错误信息
        function onError(data) {

        }



        $("#btn_scan").click(function () {
            $("#btn_scan").text("下载App马上获得扫码功能");
        })

    </script>
    @stop