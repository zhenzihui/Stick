@extends('layouts.map')

@section('head')
    <style type="text/css">
        body,html{
            height: 100%;
            margin: 0px;
        }


    </style>

    @endsection
@section('title')
    @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-heading">添加一个拐杖</div>

                <form action="{{url('stick')}}" method="post">
                    <div class="panel panel-body"> <div class="form-group">
                        <label class="control-label" for="status">设置拐杖状态
                        </label>
                        <input class=" ratio-inline" id="status" type="radio" name="status" value="T" checked/>可用
                        <input class=" ratio-inline" id="status" type="radio" name="status" value="F" />不可用
                        <input class=" ratio-inline" id="status" type="radio" name="status" value="C" />检修中
                    </div>
                    </div>
                    <div class="panel panel-body">
                        <label class="">选取投放地址</label>
                        <div class="form-group"> <div id="map" class="form-control" style="height: 300px;" tabindex="0">
                         </div>
                      <label for="lnglat">经纬度</label> <input class="form-control" name="location" id="lnglat" type="text"/>
                        <label for="lnglat">投放数量</label> <input class="form-control" name="number" id="number" type="number" value="1"/></div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" value="投放"/>
                        </div>


                    </div>




                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    @endsection
@section('mapjs')

    <script type="text/javascript">

        var locations;
        var xhr = new XMLHttpRequest();
        xhr.open('post','{{url('getsticks')}}');
        xhr.send();
        xhr.onreadystatechange=function (data) {
            if(xhr.readyState==4&&xhr.status==200){
                locations=xhr.responseText;
                locations=eval(locations);
            }
        };






        AMapUI.loadUI(['misc/PositionPicker'],function (PositionPicker) {
            var map = new AMap.Map('map',{
                resizeEnable: true,
                zoom: 16,
                center: [112.982901,28.178487]
            });
            map.plugin('AMap.Geolocation', function () {
                geolocation = new AMap.Geolocation({
                    enableHighAccuracy: true,//是否使用高精度定位，默认:true
                    timeout: 10000,          //超过10秒后停止定位，默认：无穷大
                    maximumAge: 0,           //定位结果缓存0毫秒，默认：0
                    convert: true,           //自动偏移坐标，偏移后的坐标为高德坐标，默认：true
                    showButton: true,        //显示定位按钮，默认：true
                    buttonPosition: 'LB',    //定位按钮停靠位置，默认：'LB'，左下角
                    buttonOffset: new AMap.Pixel(10, 20),//定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
                    showMarker: true,        //定位成功后在定位到的位置显示点标记，默认：true
                    showCircle: true,        //定位成功后用圆圈表示定位精度范围，默认：true
                    panToLocation: true,     //定位成功后将定位到的位置作为地图中心点，默认：true
                    zoomToAccuracy:true      //定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
                });
                map.addControl(geolocation);
                AMap.event.addListener(geolocation, 'complete', onComplete);//返回定位信息
                AMap.event.addListener(geolocation, 'error', onError);      //返回定位出错信息
            });

            var positionPicker = new PositionPicker({
                mode:'dragMap',//设定为拖拽地图模式，可选'dragMap'、'dragMarker'，默认为'dragMap'
                map:map//依赖地图对象
            });
            positionPicker.on('success', function(positionResult) {
                document.getElementById('lnglat').value =positionResult.position;
                  });
            positionPicker.on('fail', function(positionResult) {
                document.getElementById('lnglat').value = ' ';

            });
            positionPicker.start();
            map.panBy(0, 1);

            for(var i in locations)
            {
                marker =new AMap.Marker(
                    {
                        position:locations[i].location.split(','),
                        title:'编号：'+locations[i].id,
                        map:map
                    }
                );
            }





            map.addControl(new AMap.ToolBar({
                liteStyle: true
            }))
        });


    </script>
    @endsection
