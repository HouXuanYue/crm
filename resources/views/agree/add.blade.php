@extends('layouts.crm')
@section('title','crm客户系统')

@section('content')
<form class="layui-form" onsubmit="return false" >
{{csrf_field()}}
<meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="layui-form-item">
    <label class="layui-form-label">合同标题</label>
    <div class="layui-input-block">
      <input type="text" name="a_title" required id="title"  lay-verify="required|checkName" placeholder="请输入标题" autocomplete="off" class="layui-input">
      <span id="span"></span>
    </div>
  </div>
 
  <div class="layui-form-item">
    <label class="layui-form-label">客户名称</label>
    <div class="layui-input-block">
      <select name="c_id" lay-verify="required">

        
        @foreach($data as $k=>$v)
          <option value="{{$v->c_id}}">{{$v->c_name}}</option>
        @endforeach

      </select>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">合同金额</label>
    <div class="layui-input-block">
      <input type="text" name="a_money" required  lay-verify="required|money" placeholder="请输入金额" autocomplete="off" class="layui-input">
      
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">结束时间</label>
    <div class="layui-input-block">
      <input type="text" name="end_time" required  lay-verify="required" placeholder="格式: 2019/05/28" autocomplete="off" class="layui-input">
    </div>
  </div>

  
  <div class="layui-form-item">
    <label class="layui-form-label">合同状态</label>
    <div class="layui-input-block">
      <input type="radio" name="a_status" value="待审核" title="待审核">
      <input type="radio" name="a_status" value="已通过" title="已通过" checked>
      <input type="radio" name="a_status" value="不通过" title="不通过" checked>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">是否付款</label>
    <div class="layui-input-block">
      <input type="radio" name="money_status" value="是" title="是">
      <input type="radio" name="money_status" value="否" title="否" checked>
    </div>
  </div>
  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
 
<script>
//Demo
layui.use(['form','layer','jquery'], function(){
  var form = layui.form;
  var layer = layui.layer;
  var $ = layui.jquery;

   $.ajaxSetup({
         headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
  
  
  form.verify({

    checkName:function(value){
     
      var text=true;
      $.ajax({
        url:'checkOnly',
        method:'post',
        data:{a_title:value},
        async:false,
        success:function(data){
          //console.log(data);
          if (data>0) {
           text="合同标题已存在!"
          };
        },
        dataType:'json',
      });
      return text;
    },



    money:function(value){
      var reg=/^[0-9]{1,10}$/;
      if (!reg.test(value)) {
        return "合同金额必须为整数,最大不能超过十亿";
      };
    },
    
    
  });
  //监听提交
  form.on('submit(formDemo)', function(data){
   //console.log(data);
    $.post(
      "add_do",
      data.field,
      function(msg){
        layer.msg(msg.msg,{icon:msg.code,time:2000},function(){
          if (msg.code == 1) {
            location.href = "index";
          };
        });
      },'json'
      )
    return false;
  });
});
</script>
@endsection


