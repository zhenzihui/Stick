
<div class="sub-margin"><div class="col-md-5" style="float: left;width: 45%;text-align: right;">
    <a href="{{url('all')}}" id="btn_all" CLASS="btn"  STYLE="color: white;border-radius: 25px">全部拐杖</a>
</div>
<div class="col-md-2"></div>
<div class="col-md-5"  style="float: right;width: 45%;text-align: left;">
    <a href="{{url('home')}}" id="btn_home" CLASS="btn" STYLE="color: white;border-radius: 25px">信息管理</a>
</div></div>
<script>

    $(document).ready(function () {
        var url= window.location.href;
        if(url=="{{url('home')}}")
        {
            $("#btn_home").addClass('pill').css('color','black');
        }
        else if(url=="{{url('all')}}")
        {
            $("#btn_all").addClass('pill').css('color','black');
        }
    })

</script>