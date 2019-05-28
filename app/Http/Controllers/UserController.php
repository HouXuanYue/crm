<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UserModel;
use DB;
class UserController extends Controller
{
    public function login()
    {
        return view('/user/login');
    }
    public function logindo()
    {
        $data = request()->except('_token');
        // dd($data);
        if($data['u_email']==''){
            return redirect('/user/login')->with('status','登录账号必填');
        }
        if($data['u_pwd']==''){
            return redirect('/user/login')->with('status','密码必填');
        }
        $res = DB::table('user')->where('u_email',$data['u_email'])->first();
        if($res->u_pwd!=$data['u_pwd']){
            return redirect('/user/login')->with('status','账号或密码有误！');
        }else{
            request()->session()->put('u_id',$res->u_id);
            return redirect('/index/index')->with('status','登录成功');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/user/index');
    }
    public function register()
    {
        return view('/user/register');
        
    }
    public function registerhandle()
    {
        // echo 1111;die;
        $data = request()->except('pwd1');
        // dd($data);
        // $data = request()->input();
        $code  = request()->session()->get('u_code');
        // dd($code);

        if ($data['u_code'] != $code['rand']) {
            return redirect('/user/index')->with('status','验证码错误');
            // echo 11;
        }
        $res = DB::table('user')->insert($data);
        // dd($res);
        // $res = Register::insert($data);
        // dd($res);
        if ($res) {
            return redirect('user/login')->with('status','注册成功');    
        }
    }
    public function registerdo()
    {
        // echo 222;
        $u_email =  request()->u_email;
        // dd($u_email);
        $rand = rand(100000,999999);
        // dd($rand);
        \Mail::raw($rand,
            function($message)use($u_email){
        //设置主题
            $message->subject("哈哈哈");
        //设置接收方
            $res = $message->to($u_email);
            
        });
            // dd($res);
      
                $u_code = [
                    'time'=>time(),
                    'rand'=>$rand,
                    'u_email'=>$u_email
                ];
                // dd($u_code);
                request()->session()->put('u_code',$u_code);
            return ['code'=>1,'msg'=>'发送成功'];
       
    }
    public function email()
    {
        echo 1;die;
        $u_email = request()->u_email;
        // dd($email);
        $res = DB::table('user')->where('u_email',$u_email)->count();
        // dd($res);
        if ($res) {
            return ['code'=>1,'msg'=>'用户名已存在'];
           
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }

    public function logout(){
        $res=request()->session()->forget('u_id');
    }

    public function test(){
        // dump(session('email'));
        // dump(session('code'));
        // dump(session('send_time'));
        dump(session('u_id'));
    }
}
