@extends('layouts.app')

@section('nav')
@include('subNavBar')
    @stop
@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">管理面板</div>

                <div class="panel-body">
                    <div class="form-group">
                        <span>已使用拐杖：<span class="yellowText" style="font-size: xx-large">{{Auth::user()->use_count}}</span>次</span>
                    </div>

                </div>

            </div>
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="form-group">
                        <form action="{{url('detachrelation')}}" method="post">   <table class="table">
                            <caption>管理关系</caption>
                            <thead>
                            <tr>
                                <th>用户名</th>
                                <th>选择</th>
                            </tr>
                            </thead>
                          <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td><input name="{{$user->role}}[]" value="{{$user->id}}" type="checkbox"></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td><input  value="解绑" class="pill" style="" type="submit"></td>
                            </tr>
                            </tbody>
                        </table></form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
