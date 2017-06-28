@extends('layouts.map')

@section('content')
    <div class="col-md-3"></div>
 <div class="col-md-6">
     <div class="panel panel-heading">拐杖编号：{{$stick->id}}</div>
     <div class="panel panel-default">
         <form action="{{url('stick',$stick->id)}}" method="post">
             {!! method_field('PATCH') !!}
             <div class="form-group">
                 <div id="map" class="form-control" style="height: 300px"></div>
                 <label for="location">位置：</label>
                 <input id="location"  class="form-control" type="text" name="location"/>
             </div>
                <div class="form-group">
                    <label for="status">状态</label>
                    <input type="radio" name="status"  id="status" value="T" {{$stick->status=='T'?'checked':''}}/>可用
                    <input type="radio" name="status"  id="status" value="F"{{$stick->status=='F'?'checked':''}}/>不可用
                </div>
             <div class="form-group">
                    <input type="submit" value="修改" class="form-control btn btn-warning">
             </div>
         </form>
     </div>

 </div>
    <div class="col-md-3"></div>
    @endsection
    @section('mapjs')
        <script type="text/javascript">
            AMapUI.loadUI(['misc/PositionPicker'],function (PositionPicker) {
                var map = new AMap.Map('map',{
                    resizeEnable: true,
                    zoom: 16,
                    center: [{{$stick->location}}]
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
                    document.getElementById('location').value =positionResult.position;
                });
                positionPicker.on('fail', function(positionResult) {
                    document.getElementById('location').value = '定位失败';

                });
                positionPicker.start();
                map.panBy(0, 1);

                map.addControl(new AMap.ToolBar({
                    liteStyle: true
                }))
            });
        </script>
        @endsection

