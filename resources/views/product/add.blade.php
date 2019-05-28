@extends('layouts.crm')
@section('title','crm客户系统')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="{{asset('js/jquery.js')}}"></script>
<form class="layui-form" action="">
  <div class="layui-form-item">
    <label class="layui-form-label">产品名称</label>
    <div class="layui-input-inline">
      <input type="text" name="p_name" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">分类名称</label>
    <div class="layui-input-inline">
      <select name="cate_id" lay-verify="required">
      @if($cate)
      @foreach($cate as $k=>$v)
        <option value="{{$v->cate_id}}">{{str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$v->level)}}{{$v->cate_name}}</option>
      @endforeach
      @endif
      </select>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">供应商名称</label>
    <div class="layui-input-inline">
      <select name="s_id" lay-verify="required">
      @if($supplier)
      @foreach($supplier as $k=>$v)
        <option value="{{$v->s_id}}">{{$v->s_trade}}</option>
      @endforeach
      @endif
      </select>
    </div>
  </div>


   <div class="layui-form-item">
    <label class="layui-form-label">产品数量</label>
    <div class="layui-input-inline">
      <input type="text" name="p_number" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">产品单价</label>
    <div class="layui-input-inline">
      <input type="text" name="shop_price" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
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
$.ajaxSetup({
 headers: {
 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 }
});


layui.use(['form','layer'], function(){
  var form = layui.form;
  var layer = layui.layer;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
      console.log(data.field);
    $.post(
        "{{url('/product/adddo')}}",
        data.field,
        function(msg){
            if(msg.code==1){
                layer.msg(msg.font,{icon:msg.code});
                location.href="{{url('/product/list')}}";
            }
        },'json'
    );
    return false;
  });
});
</script>




@endsection