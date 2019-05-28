@extends('layouts.crm')
@section('title','crm客户系统')

@section('content')

<table class="layui-table">
  <colgroup>
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>编号</th>
      <th>分类名称</th>
      
    </tr> 
  </thead>
  <tbody>
   @foreach($data as $k=>$v)
    <tr>
      <td>{{$v->cate_id}}</td>
      <td>{{str_repeat('一',$v->level)}}{{$v->cate_name}}</td>
    </tr>
     @endforeach
  </tbody>

  
</table>

@endsection