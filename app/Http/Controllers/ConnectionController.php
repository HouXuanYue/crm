<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize = config('app.pageSize');
        $data = DB::table('connection')->paginate(3);
        return view('connection.index',['data'=>$data]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/connection/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo 111;die;
      $data = request()->all();
        // dd($data);
        $res = DB::table('connection')->insert($data);
        // dd($res);
        if($res){
            return ['code'=>1,'msg'=>'添加成功'];
        }else{
            return ['code'=>2,'msg'=>'添加失败'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $c_id=request()->c_id;
        // dd($c_id);
        $data=DB::table('connection')->where('c_id',$c_id)->delete();
        if($data){
            return ['font'=>'删除成功','code'=>1,'icon'=>6];
        }
    }
}
