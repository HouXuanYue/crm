@extends('layouts.crm')
@section('title','crm客户系统')

@section('content')


<h1 align="center">CRM销售管理系统</h1>
<form class="layui-form" action="get" onclick="return false">
  <div class="layui-form-item">
    <label class="layui-form-label">客户名称</label>
    <div class="layui-input-block">
      <select name="c_id" lay-verify="required" id="c_id">
        <option value=""></option>
        @foreach($res as $v)
        <option value="{{$v->c_id}}">{{$v->c_name}}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">预计签单时间</label>
    <div class="layui-input-block">
      <input type="text" name="bill_time" id="bill_time" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>
    <div class="layui-form-item">
    <label class="layui-form-label">销售金额</label>
    <div class="layui-input-block">
      <input type="text" name="m_money" required id="m_money" lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>
 
  <div class="layui-form-item">
    <label class="layui-form-label">销售状态</label>
    <div class="layui-input-block">
      <input type="radio" name="m_status" value="已签单" title="已签单" id="m_status">
      <input type="radio" name="m_status" value="未签单" title="未签单" id="m_status" checked>
    </div>
  </div>
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">销售主题</label>
    <div class="layui-input-block">
      <textarea name="m_title" placeholder="请输入内容" id="m_title" class="layui-textarea"></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
    <input type="button" value="立刻提交" class="layui-btn" />
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
<script src="/js/jquery.js"></script>
 
<script>
//Demo
layui.use('form', function(){
  var form = layui.form;
  $('.layui-btn').click(function(){
            // alert(11);
           var data ={};
            data.c_id = $('#c_id').val();
            data.bill_time = $('#bill_time').val();
            data.m_money = $('#m_money').val();
            data.m_status = $('#m_status').val();
            data.m_title = $('#m_title').val();
            // console.log(data);
            
            $.get(
              "/market/doadd",
              data,
              function(res)
              {
                console.log(res);
                if (res.code==1) {
                  alert(res.msg);
                  location.href="/market/list";
                };
              },'json'
              );

          })
 
});
</script>


@endsection
