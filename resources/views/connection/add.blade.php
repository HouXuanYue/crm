@extends('layouts.crm')
@section('title','crm客户系统')


@section('content')
<script src="/js/jquery.js"></script>
<form class="layui-form" onsubmit="return false">
  <div class="layui-form-item">
    <label class="layui-form-label">姓名</label>
    <div class="layui-input-block">
      <input type="text" name="c_name" required  lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">性别</label>
    <div class="layui-input-block">
      <input type="radio" name="c_sex" value="男" title="男">
      <input type="radio" name="c_sex" value="女" title="女" checked>
    </div>
  </div>

   <div class="layui-form-item">
    <label class="layui-form-label">职务</label>
    <div class="layui-input-block">
      <input type="text" name="c_job" required  lay-verify="required" placeholder="请输入职务" autocomplete="off" class="layui-input">
    </div>
  </div>
  
   <div class="layui-form-item">
    <label class="layui-form-label">手机号</label>
    <div class="layui-input-block">
      <input type="text" name="c_tel" required  lay-verify="required" placeholder="请输入手机号" autocomplete="off" class="layui-input">
    </div>
  </div>

   <div class="layui-form-item">
    <label class="layui-form-label">邮箱</label>
    <div class="layui-input-block">
      <input type="text" name="c_email" required  lay-verify="required" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
    </div>
  </div>

   <div class="layui-form-item">
    <label class="layui-form-label">地址</label>
    <div class="layui-input-block">
      <input type="text" name="c_address" required  lay-verify="required" placeholder="请输入地址" autocomplete="off" class="layui-input">
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
        "{{url('connection/add_do')}}",
        data.field,
        function(res){
          if(res.code==1){
              alert(res.msg);
              location.href="{{url('/connection/index')}}";
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