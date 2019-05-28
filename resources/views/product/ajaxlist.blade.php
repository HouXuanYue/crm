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