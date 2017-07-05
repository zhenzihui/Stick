@extends('layouts.app')

@section('head')
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    @endsection

@section('content')

    <div class="container">
        <div class="row">


            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">设置{{$user->role=='user'?'监护人':'使用者'}}</div>

                    <div class="panel-body">
                       <form action="{{url('setrelation')}}" method="post">
                               @foreach($users as $usr)
                                <div class="form-group">
                                <input id="{{$usr->name}}" class="" type="checkbox" name="{{$usr->role}}[]" value="{{$usr->id}}" /><label for="{{$usr->name}}">{{$usr->name}}</label>
                                </div>
                               @endforeach
                           <div class="form-group">
                               <input class="btn-submit" id="relation_btn" type="submit" value="关联"/>
                           </div>
                           {!! csrf_field() !!}
                       </form>

                        <script>
                            $(document).ready(function () {
                                $("#relation_btn").click(function () {
                                    $('#relation_btn').val('请稍后...');
                                })
                            })
                        </script>
                    </div>
                </div>
            </div>

                <div class="col-md-8 col-md-offset-2">

                </div>

        </div>
    </div>

    @endsection