@extends('layouts.crm')
@section('title','crm客户系统')


@section('content')
<script src="/js/jquery.js"></script>
<link href="{{asset('css/page.css')}}" rel="stylesheet" type="text/css">
<table class="layui-table">
<form class="layui-form" onsubmit="return false">
  <colgroup>
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>姓名</th>
      <th>性别</th>
      <th>职务</th>
      <th>手机号</th>
      <th>邮箱</th>
      <th>地址</th>
      <th>操作</th>
    </tr> 
  </thead>
  @if($data)
  @foreach($data as $v)
  <tbody>
    <tr c_id ="{{$v->c_id}}">
      <td>{{$v->c_id}}</td>
      <td>{{$v->c_name}}</td>
      <td>{{$v->c_sex}}</td>
      <td>{{$v->c_job}}</td>
      <td>{{$v->c_tel}}</td>
      <td>{{$v->c_email}}</td>
      <td>{{$v->c_address}}</td>
      <td>
        <button class="layui-btn layui-btn-sm btn">
          <i class="layui-icon" >&#xe640;</i>
        </button>
      </td>
    </tr>
    </form>
  </tbody>
  @endforeach
  @endif
</table>
{{ $data->links() }}


<script>
  layui.use(['form','layer'], function(){
  var form=layui.form;
  var layer = layui.layer;

  //ajax删除
  $('.btn').click(function(){
   var  _this=$(this);
    var c_id=_this.parents('tr').attr('c_id');
    // console.log(c_id);
   $.post(
     "{{url('connection/destroy')}}",
     {c_id:c_id},
     function(msg){
      layer.msg(msg.font,{icon:msg.icon,time:2000},function(){
        _this.parents('tr').remove();
      });
     },'json'
   );
  })

})
</script>
@endsection
