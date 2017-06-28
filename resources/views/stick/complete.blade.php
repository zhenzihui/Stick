@extends('layouts.map')

@section('head')
<script type="text/javascript" src="https://webapi.amap.com/maps?v=1.3&key=22652046df5498896643171b9fc9108a&plugin=AMap.Walking"></script>
<link rel="stylesheet" href="https://cache.amap.com/lbs/static/main1119.css"/>
@endsection

@section('title')
行程结束
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="panel panel-default"><div class="panel panel-heading"> <h4>行程结束</h4></div>
              <div class="panel-body panel">  <div class="form-group">

                        <div class="form-control" style="height: 300px;" id="map">
                        </div>
                    <div class="form-group">

                    <span>使用时长：{{
                   date('m:s',strtotime($user_stick->end_time)- strtotime($user_stick->start_time))
                    }}</span>
                    </div>
                    <div class="form-group" align="center">
                        <button id="complete" style="border-radius: 15px;background-color: #ffda00;width: 90px;height: 30px;border: 0px;color: black;" onclick="complete()">确认结束</button>
                    </div>

                </div></div></div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <script type="text/javascript">
        var map = new AMap.Map("map", {
            resizeEnable: true,
            zoom: 15 //地图显示的缩放级别
        });

        //步行导航
        var walking = new AMap.Walking({
            map: map
        });
        //根据起终点坐标规划步行路线
        walking.search([{{$user_stick->start_location}}],[113.015025,28.141401]);

        function complete() {
            btn=document.getElementById("complete");
            btn.innerText="感谢体验";
            btn.setAttribute("disabled","disabled");
            location.href='{{url('home')}}'
        }
    </script>
    @endsection