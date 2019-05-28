<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('category')->get();
        $data=DB::table('category')->get()->toArray();
        //dd($data);
        $data=$this->createTree($data);
        //dd($data);
        return view('category/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=DB::table('category')->get();
        $data=DB::table('category')->get()->toArray();
        //dd($data);
        $data=$this->createTree($data);
        
        return view('category/add',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->except("_token");
         
        $res=DB::table("category")->insert($data);
        if ($res) {
            return ['msg'=>'添加成功','code'=>1];
            return redirect('/agree/index');
        }else{
            return ['msg'=>'添加失败','code'=>2];
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
