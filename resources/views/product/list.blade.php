@extends('layouts.crm')
@section('title','crm客户系统')

@section('content')
<script src="{{asset('js/jquery.js')}}"></script>
<link href="{{asset('css/page.css')}}" rel="stylesheet" type="text/css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<form>
<table>
  <tr>
    <td><input type="text" name="p_name" value="{{$query['p_name']??''}}" placeholder="请输入产品名称"></td>
    <td><button>搜索</button></td>
  </tr>
</table>
</form>
<div id="con">
<table class="layui-table">
  <colgroup>
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>编号</th>
      <th>产品编号</th>
      <th>产品名称</th>
      <th>产品分类</th>
      <th>产品数量</th>
      <th>供应商</th>
      <th>产品价格</th>
      <th>操作</th>
    </tr> 
  </thead>
  <tbody>
  @if($data)
  @foreach($data as $k=>$v)
    <tr>
      <td>{{$v->p_id}}</td>
      <td>{{$v->p_on_number}}</td>
      <td>{{$v->p_name}}</td>
      <td>{{$v->cate_name}}</td>
      <td>{{$v->p_number}}</td>
      <td>{{$v->s_trade}}</td>
      <td>{{$v->shop_price}}</td>
      <td style="cursor:pointer" class="del"  p_id={{$v->p_id}}>删除</td>
    </tr>
 @endforeach
  @endif
  </tbody>
</table>
{{ $data->links() }}
</div>
<script>
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('.del').click(function(){
        var _this = $(this);
        var p_id = _this.attr('p_id');
        // alert(p_id);
        $.post(
            "{{url('/product/del')}}",
            {p_id:p_id},
            function(res){
                if(res.code==1){
                    alert(res.font);
                    location.href="{{url('/product/list')}}";
                }
            },
            'json'
        );
    });

    $(document).on('click','.pagination a',function(){
      var url = $(this).attr('href');
      // alert(url);
      $.get(
        url,
        '',
        function(res){
          $('#con').html(res);
        }
      );
      return false;
    });
</script>


@endsection

