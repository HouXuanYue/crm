<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    
    public function index()
    {
        $query = request()->all();
        // dd($query);
        $where = [];
        if($query['p_name']??''){
            $where [] = ['p_name','like',"%$query[p_name]%"];
        }
        $pagesize = config('app.pagesize');
        // dd($pagesize);
        $data = DB::table('product')
                ->join('category','product.cate_id','=','category.cate_id')
                ->join('supplier','product.s_id','=','supplier.s_id')
                ->where($where)
                ->select('p_id','p_name','cate_name','p_number','s_trade','shop_price','p_on_number')
                ->paginate($pagesize);
        // dd($data);
        if(request()->ajax()){
            return view('product.ajaxlist',['data'=>$data]);
        }
        return view('/product/list',['data'=>$data,'query'=>$query]);
    }

   
    public function create()
    {
        $supplier = DB::table('supplier')->get();
        // dd($supplier);
        $cate = DB::table('category')->get()->toArray();
        // dd($cate);
        $cate=$this->createTree($cate);
        // dd($cate);
        return view('/product/add',['cate'=>$cate,'supplier'=>$supplier]);
    }

    public function adddo(){
        $data = request()->all();
        $data['p_on_number'] = time().rand(1000,9999);
        // dd($data['p_on_number']);
        $res = DB::table('product')->insert($data);    
        if($res){
            echo json_encode(['code'=>1,'font'=>'添加成功']);
        }else{
            echo json_encode(['code'=>2,'font'=>'添加失败']);
        }    
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function del()
    {
        $p_id = request()->p_id;
        // dd($p_id);
        $res = DB::table('product')->where('p_id',$p_id)->delete();
        if($res){
            echo json_encode(['code'=>1,'font'=>'删除成功']);
        }else{
            echo json_encode(['code'=>2,'font'=>'删除失败']);
        }   
    }

     //无限极分类
     public function createTree($data,$cate_pid=0,$level=1)
    {
     
      if (!$data || !is_array($data)) {
          return;
      }
      static $arr=[];
      foreach($data as $k=>$v){
          if ($v->cate_pid == $cate_pid) {
              $v->level=$level;
              $arr[]=$v;
              $this->createTree($data,$v->cate_id,$level+1);
          }
      }
      //dd($data);
      return $arr;
  
  
    }
}
