@extends('layouts.crm')
@section('title','crm客户系统')

@section('content')
<style type="text/css">
        #pull_right{
            text-align:center;
        }
        .pull-right {
            /*float: left!important;*/
        }
        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
        }
        .pagination > li {
            display: inline;
        }
        .pagination > li > a,
        .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #428bca;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        .pagination > li:first-child > a,
        .pagination > li:first-child > span {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        .pagination > li:last-child > a,
        .pagination > li:last-child > span {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .pagination > li > a:hover,
        .pagination > li > span:hover,
        .pagination > li > a:focus,
        .pagination > li > span:focus {
            color: #2a6496;
            background-color: #eee;
            border-color: #ddd;
        }
        .pagination > .active > a,
        .pagination > .active > span,
        .pagination > .active > a:hover,
        .pagination > .active > span:hover,
        .pagination > .active > a:focus,
        .pagination > .active > span:focus {
            z-index: 2;
            color: #fff;
            cursor: default;
            background-color: #428bca;
            border-color: #428bca;
        }
        .pagination > .disabled > span,
        .pagination > .disabled > span:hover,
        .pagination > .disabled > span:focus,
        .pagination > .disabled > a,
        .pagination > .disabled > a:hover,
        .pagination > .disabled > a:focus {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd;
        }
        .clear{
            clear: both;
        }
    </style>

<h1 align="center">CRM销售管理系统</h1>
<form action="/market/list">
  <input type="text" name="c_name"><button>搜索</button>
</form>
<table class="layui-table">
  <colgroup>
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>客户姓名</th>
      <th>销售主题</th>
      <th>销售状态</th>
      <th>销售金额</th>
      <th>操作</th>
    </tr> 
  </thead>
  <tbody>
  @foreach($res as $v)
    <tr m_id={{$v->m_id}}>
      <td>{{$v->c_name}}</td>
      <td>{{$v->m_title}}</td>
      <td>{{$v->m_status}}</td>
      <td>{{$v->m_money}}</td>
      <td><input type="button" value="删除" class="del"></td>
      
    </tr>
 @endforeach   
  </tbody>
 
</table>
<div id="pull_right">
       <div class="pull-right">
            {{ $res->appends($query)->links() }} 

       </div>
 </div>

@endsection
<script src="/js/jquery.js"></script>

<script>
$(function(){
   $(".del").click(function(){
     // alert(111);
    var m_id = $(this).parents('tr').attr('m_id');
    // console.log(m_id);

         $.ajax({
           url:'/market/del',
           type:"get",  
           dataType:"json",  
           data:{"m_id":m_id},
           success:function(data){
            // console.log(data);

            	if (data.code==1) {
            		alert(data.msg);
                window.location.reload();
            	};
                
            
            }

        });
        return false;
    });
   
   
})

</script>