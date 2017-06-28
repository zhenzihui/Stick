@extends('layouts.app')
@section('title')
    只需一步
    @endsection
@section('head')

    <script src="{{url('js','SG_area_select.js')}}"></script>
    <script src="{{url('js','iscroll.js')}}"></script>
    <link type="text/css" href="{{url('css','SG_area_select.css')}}" rel="stylesheet"/>
    @endsection
@section('content')
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-heading">
            <div class="panel-heading" align="center"><label>让我们更加了解您</label></div>
            <div class="panel-body">
                <form action="setinfo" method="post">
                    <div class="form-group">
                        <label for="realname">真实姓名</label>
                        <input type="text" class="form-control" id="realname" name="realname"/>
                    </div>
                    <div class="form-group">
                        <label for="idcard">身份证号</label>
                        <input type="text" class="form-control" id="idcard" placeholder="" name="idcard"/>
                    </div>
                    <div class="form-group">
                        <label for="">性别</label>
                        <select  class="form-control"
                        data-mobile="true">
                            <option>
                                男
                            </option>
                            <option>
                                女
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="birthday">贵庚</label>
                        <input type="date" name="birthday" class="form-control" value="1950-01-01" id="birthday"/>
                    </div>

                    <div class="form-group">
                        <label for="ill">以往病史</label>
                        <select id="ill" class="form-control"
                        data-mobile="true">
                            <option>
                                我好得很！
                            </option>
                            <optgroup label="老年人特有的疾病">
                                
                            
                            <option>
                                老年性痴呆
                            </option>
                             <option>
                                 老年性精神病
                            </option>
                             <option>
                                 老年性耳聋
                            </option>
                                <option>
                                    脑动脉硬化
                                </option>
                            </optgroup>
                            
                            <optgroup label="老年人常见的疾病">
                                <option>
                                    高血压病
                                </option>
                                <option>
                                    冠心病
                                </option>
                                <option>
                                    糖尿病
                                </option>
                                <option>
                                    恶性肿瘤
                                </option>
                                <option>
                                    痛风
                                </option>
                                <option>
                                    震颤麻痹
                                </option>
                                <option>
                                    老年性变性骨关节病
                                </option>
                                <option>
                                    老年性慢性支气管炎
                                </option>
                                <option>
                                    肺气肿
                                </option>
                                <option>
                                    肺源性心脏病
                                </option>
                                <option>
                                    老年性白内障
                                </option>
                                <option>
                                    老年骨质疏松症
                                </option>
                                <option>
                                    老年性皮肤搔痒症
                                </option>
                              <option>
                                  老年肺炎
                                </option>
                              <option>
                                  高脂血症
                                </option>
                              <option>
                                  颈椎病
                                </option>
                             <option>
                                 前列腺肥大
                                </option>
                               <option>
                                   急性心肌梗塞
                                </option>
                               <option>
                                   胃癌
                                </option>
                               <option>
                                   脑出血
                                </option>
                               <option>
                                   糖尿病
                                </option>
                            </optgroup>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selectBtn">住址</label>
                        <input id="selectBtn" class="sg-area-result form-control" type="" name="city" style="">
                    </div>
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn-submit" value="提交信息"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-2">

    </div>
<script>


    $(document).ready(function(){
        $('#selectBtn').on('click',function(){
            $.areaSelect();
        })

    })

</script>
    @endsection