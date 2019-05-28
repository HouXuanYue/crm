@extends('layouts.crm')
@section('title','crm客户系统')

@section('content')

<link rel="stylesheet" href="/css/page.css">
<table class="layui-table">
  <colgroup>
    <col width="20">
    <col width="100">
    <col>
  </colgroup>
  <thead>
    <tr>
              <td width="20px" class="tdColor tdC">序号</td>
              <td width="200px" class="tdColor">合同编号</td>
              <td width="200px" class="tdColor">合同标题</td>
              <td width="100px" class="tdColor">客户名称</td>
              <td width="100px" class="tdColor">合同金额</td>
              <td width="290px" class="tdColor">合同时间</td>
              <td width="130px" class="tdColor">合同状态</td>
              <td width="130px" class="tdColor">付款状态</td>
              <td width="130px" class="tdColor">操作</td>
            </tr>
  </thead>
  <tbody>
    @foreach($data as $k=>$v)
            <tr height="50px">
              <td>{{$v->a_id}}</td>
              <td>
                {{$v->a_number}}
              </td>
              <td>{{$v->a_title}}</td>
              <td>{{$v->c_name}}</td>
              <td>{{$v->a_money}} 元</td>
              <td>{{$v->start_time1}}--{{$v->end_time}}</td>
              <td>{{$v->a_status}}</td>
              <td>{{$v->money_status}}</td>
              <td><a href="connoisseuradd.html"><img class="operation"
                  src="img/update.png"></a> <img class="operation delban"
                src="img/delete.png"></td>
            </tr>
            @endforeach
  </tbody>
  <tr>
    <td colspan="9" align="right">{{ $data->links() }}</td>
  </tr>
</table>

@endsection