@extends('layouts.app')
@section('head')
    <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=22652046df5498896643171b9fc9108a"></script>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-2">
            <div id="map" class="media">

            </div>

            </div>
            <div class="col-md-5"></div>
        </div>
    </div>

    <script>
        var map=new AMap.Map('map',{
           zoom:10,
            center:[116.39,39.9]
        });
    </script>
    @endsection