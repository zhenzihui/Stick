@extends('layouts.app')

@section('head')
    <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=22652046df5498896643171b9fc9108a"></script>
    <script type="text/javascript" src="http://cache.amap.com/lbs/static/addToolbar.js"></script>
    @endsection
@section('content')
    
<div class="container"><div class="row">
        <div class="col-md-4"></div>
<div class="col-md-4">
    <div class="panel panel-heading">使用该拐杖
    </div>
    <div class="panel panel-content">
        <form action="{{url('unlock')}}" method="post">
            <div class="form-group">
            <label for="id">解锁编号如下的拐杖？</label>
                <input type="text" id="id" name="id" value="{{$stick->id}}" class="form-control" />
            </div>
            <div class="form-group">
            <input type="submit" class="btn btn-warning form-control" value="解锁使用"/>
            <input type="hidden" id="start_location" name="start_location"/>
            </div>

        </form>
    </div>
    </div>

    </div>
</div>
        <div class="col-md-4"></div>
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
       document.getElementById('start_location').value=lat+","+lng;
    }
    //解析定位错误信息
    function onError(data) {
        document.getElementById('start_location').value = '展销会位置';
    }
</script>

    @endsection
