<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=22652046df5498896643171b9fc9108a"></script>
        <!--引入UI组件库（1.0版本） -->
        <script src="//webapi.amap.com/ui/1.0/main.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    试&nbsp;&nbsp;用
                </div>

                <div  id="map" style="height: 300px;" tabindex="0">

                </div>
            </div>
        </div>
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
    </body>
</html>
