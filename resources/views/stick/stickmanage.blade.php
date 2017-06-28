@extends('layouts.app')
@section('content')
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <table class="table">
                        <caption>管理拐杖</caption>
                        <thead>
                        <tr>
                            <th>拐杖编号</th>
                            <th>位置</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sticks as $stick)
                            <tr>
                                <td>{{$stick->id}}</td>
                                <td>{{$stick->location}}</td>
                                <td>
                                    <form action="{{url('stick',$stick->id)}}" method="post">
                                        {!! method_field('DELETE') !!}
                                        <button type="submit" class="btn btn-danger">删除</button>
                                    </form>

                                    <a href="{{url('stick',$stick->id.'/edit')}}" class="btn btn-warning">修改</a></td>
                            </tr>
                        @endforeach
                           {!! $sticks->links() !!}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2"></div>

@endsection