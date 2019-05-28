@extends('layouts.crm')
@section('title','crm客户系统')

@section('content')
<form class="layui-form" onsubmit="return false">
  <div class="layui-form-item">
    <label class="layui-form-label">供应商名称</label>
    <div class="layui-input-block">
      <input type="text" name="s_trade" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">供应商姓名</label>
    <div class="layui-input-block">
      <input type="text" name="s_name" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">性别</label>
    <div class="layui-input-block">
      <input type="radio" name="s_sex" value="男" title="男">
      <input type="radio" name="s_sex" value="女" title="女" checked>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">职务</label>
    <div class="layui-input-block">
      <input type="text" name="s_job" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">手机号</label>
    <div class="layui-input-block">
      <input type="text" name="s_tel" required  lay-verify="required|phone" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">邮箱</label>
    <div class="layui-input-block">
      <input type="text" name="s_email" required  lay-verify="required|email" placeholder="请输入标题" autocomplete="off" class="layui-input">
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
layui.use(['form','layer'], function(){
  var form = layui.form;
  var  layer = layui.layer;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
    $.post(
        "{{url('supplier/add_do')}}",
        data.field,
        function(res){
          if(res.code==1){
              alert(res.msg);
              location.href="{{url('/supplier/index')}}";
          }else if(res.code==2){
              alert(res.msg);
          };
          
        },
        'json'
    );
    return false;
  });
});
</script>
@endsection