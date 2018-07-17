<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Hash;
use Session;

class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('home.login.login',[
    		'title'=>'登录'
    	]);
    }

    public function dologin(Request $request)
    {
        $res = $request->except('_token');

        $data = User::where('uname',$res['uname'])->first();

        $uname = $res['uname'];

        $password = $res['password'];

        //获取用户名
        if($data['uname'] != $uname){

            return back()->with('error','用户名或密码不正确');
        }

        //判断密码
        if (!Hash::check($password,$data['password'])) {

            //如果说密码失败
            return back()->with('error','用户名或密码不正确');
        }

        session(['user'=>$data]);
        
        return redirect('/');
    }

    public function logout()
    {
        //第一步删除session里面存储的信息
        session(['user'=>'']);

        //跳转到登录页面
        return redirect('home/login');
    }
}
