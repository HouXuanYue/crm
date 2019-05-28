<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Cache;

class MarketController extends Controller
{
    public function add()
    {
    	$res = DB::table('connection')->get();
    	// dd($res);
    	return view('/market/add',compact('res'));
    }
    public function doadd()
    {
    	// echo 123;
    	$data = request()->input();
    	$data['bill_time'] = strtotime($data['bill_time']);
    	// dd($data);

    	$data['file_time'] = time();
    	// dd($data);
    	$res = DB::table('market')->insert($data);
    	// dd($res);
    	if ($res) {
    		return ['code'=>1,'msg'=>'添加成功'];
    	}else{
    		return ['code'=>1,'msg'=>'添加失败'];

    	}
    }
    public function list()
    {
        // echo 123;
        $c_name = request()->c_name;
        $query = request()->all();
        // dd($query);
        $c_name = $query['c_name']??'';
        // dd($c_name);

        // dd($c_name);
        //获取每页显示条数
        $pagesize =config('app.pageSize');
        // dd($pagesize);
        //显示第几页
        $page = request()->page;
        // dd($page);
        // dd($co);
        // 获取缓存键名
        $res = Cache::get('lts_'.$page.'_'.$c_name);
        // dd($res);0
        if (!$res) {
            echo 123;
            //查询
            $where = [];
            if (isset($query['c_name'])) {
                $where[] = ['c_name','like',"%$query[c_name]%"];
            }
            $res = DB::table('market')->join('connection','connection.c_id','=','market.c_id')->where($where)->paginate($pagesize);
            // dd($res);
            //添加缓存
            Cache::put(['lts_'.$page.'_'.$article_title=>$res],60);
            // dd($res);
    	   // return view('/market/list',compact('res'));
        }
        // dd($res);
        //视图
           return view('/market/list',compact('res','query'));
    }
    public function del()
    {
	    $id = request()->m_id;
	    // dd($id);
    	$res = DB::table('market')->where('m_id','=',$id)->delete();
        // dd($res);
        if ($res) {
            // return redirect('/article/list');
            return response()->json(['code' => 1,'msg'=>'删除成功']);

        }
    }
     function objectToArray($object) {
    //先编码成json字符串，再解码成数组
    return json_decode(json_encode($object), true);
    }
    public function arrayToObject($e)
    {

        if (gettype($e) != 'array') return;
        foreach ($e as $k => $v) {
            if (gettype($v) == 'array' || getType($v) == 'object')
                $e[$k] = (object)$this->arrayToObject($v);
        }
        return (object)$e;
    }
}
