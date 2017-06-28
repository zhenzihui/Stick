@extends('layouts.app')

@section('head')
    <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=22652046df5498896643171b9fc9108a"></script>
    <script type="text/javascript" src="http://cache.amap.com/lbs/static/addToolbar.js"></script>
     <!--引入UI组件库（1.0版本） -->
    <script src="//webapi.amap.com/ui/1.0/main.js"></script>
@endsection

@section('content')

    <div class="container"><div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-heading" style="">智能拐杖行程中
                </div>
                <div class="form-control" tabindex="0" id="map" style="">

                </div>
                <div style="margin-top: 25px" >
                  <form action="{{url('lock')}}" method="post">
                      <input type="hidden" name="location" id="location" />
                      <input type="hidden" name="id" value="{{$stick->id}}">
                        <div class="form-group" align="center" style="">
                            <button id="uploadBtn" class="btn-form" style="border-radius: 25px;background-color: #ffda00;color: black;border: 0px;width: 100px;height: 40px">结束行程</button>
                        </div></form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>


    <script type="text/javascript">
        $("body").height( $(window).height() );
        mapHeight=$("body").height()-$("nav").height()-$(".panel.panel-heading").height()-200;
        $("#map").height(mapHeight);

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
                zoom: 13


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
                geolocation.getCurrentPosition();
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

            function onComplete(data) {
                lat= data.position.getLat();
                lng=data.position.getLng();
               loc=data.position;
              
                document.getElementById("location").value=lng+","+lat;
            }
            function onError(data) {
                document.getElementById("location").value="112.904233,28.209581";


            }

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