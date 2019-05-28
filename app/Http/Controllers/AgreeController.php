<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Agree;


class AgreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('agreement')->join('connection','agreement.c_id','=','connection.c_id')->paginate(8);
        //dd($data);

        return view('/agree/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=DB::table("connection")->get();
        //dd($data);
        return view('agree/add',compact('data'));
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
        //dd($data);
        $data['start_time1']=date('Y/m/d ',time());
        $code=date('Ym').rand(0000,9999);
        //dd($code);
        $data['a_number']=$code;
        $res=DB::table("agreement")->insert($data);
        if ($res) {
            return ['msg'=>'添加成功','code'=>1];
            return redirect('/agree/index');
        }else{
            return ['msg'=>'添加失败','code'=>2];
        }
        //dd($res);
        //dd($data);
    }

    public function checkOnly()
    {
        $a_title=request()->all();
        //dd($a_title);
        
        $where[]=['a_title','=',$a_title];
        //dd($where);
        $count=DB::table('agreement')->where($where)->count();
       echo $count;
    }


}
