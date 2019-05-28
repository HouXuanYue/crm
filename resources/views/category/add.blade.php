@extends('layouts.crm')
@section('title','crm客户系统')

@section('content')

<form class="layui-form" action="">
  {{csrf_field()}}
  <div class="layui-form-item">
    <label class="layui-form-label">分类名称</label>
    <div class="layui-input-inline">
      <input type="text" name="cate_name" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label" >分类添加 </label>
    <div class="layui-input-inline">
      <select name="cate_pid" lay-verify="required">
        <option value="0">顶级分类</option>
        @foreach($data as $k=>$v)
          <option value="{{$v->cate_id}}">{{str_repeat('一',$v->level)}}{{$v->cate_name}}</option>
        @endforeach
      </select>
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
  
  //监听提交
  form.on('submit(formDemo)', function(data){
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