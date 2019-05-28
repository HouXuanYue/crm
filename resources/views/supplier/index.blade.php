@extends('layouts.crm')
@section('title','crm客户系统')

@section('content')
<link href="{{asset('css/page.css')}}" rel="stylesheet" type="text/css">
<table class="layui-table">
  <colgroup>
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>供应商名称</th>
      <th>供应商姓名</th>
      <th>性别</th>
      <th>职务</th>
      <th>电话</th>
      <th>邮箱</th>
      <th>操作</th>
    </tr> 
  </thead>
  @if($data)
  @foreach($data as $v)
  <tbody>
    <tr>
      <td>{{$v->s_id}}</td>
      <td>{{$v->s_trade}}</td>
      <td>{{$v->s_name}}</td>
      <td>{{$v->s_sex}}</td>
      <td>{{$v->s_job}}</td>
      <td>{{$v->s_tel}}</td>
      <td>{{$v->s_email}}</td>
      <td><a href="{{url('supplier/del',['s_id'=>$v->s_id])}}">删除</a></td>
    </tr>
  </tbody>
  @endforeach
  @endif
</table>
{{ $data->links() }}

@endsection