<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ucpaas;
use App\Models\Admin\User;
use Hash;
use DB;

class BackController extends Controller
{
    //
    public function index()
    {
        return view('home.back.index', ['title' => '找回密码']);
    }

    public function tel(Request $request)
    {
        $phone = $request->get('number');

        session(['phone' => $phone]);

        //初始化必填
        $options['accountsid'] = '491089c13b9802a6030535b416fb8bfc';
        $options['token']      = 'c488026665b06103d29c2461391de877';

        //初始化 $options必填
        $ucpass = new Ucpaas($options);

        //开发者账号信息查询默认为json或xml

        $ucpass->getDevinfo('xml');

        $code = rand(1111, 9999);

        // $_SESSION['code'] = $code;
        session(['code' => $code]);

        $appId = "b2c44ac2e6fc4a8e82b212b009e8472f";

        $templateId = "348490";
        $param      = $code;

        $ucpass->templateSMS($appId, $phone, $templateId, $param);

        echo $code;
    }

    public function code(Request $request)
    {
        $code = $request->get('code');

        $scode = session('code');

        if($code != $scode){

        	return 1;

        }

        
    }

    public function npwd(Request $request)
    {
    	return view('home.back.npwd',['title'=>'修改密码']);
    }


    public function pwd(Request $request)
    {
    	$tel = session('phone');

		$data = User::where('tel',$tel)->first();

		$this->validate($request, [
			'password' => 'required|regex:/^\S{6,12}$/',
            'repass'   =>'same:password',
        ],[
        	'password.required' =>'密码不能为空',
            'password.regex'    =>'密码格式不正确',
            'repass.same'       =>'两次密码不一致',
        ]); 

		$res = $request->except(['_token','repass']);

		

		//密码加密
        $res = Hash::make($request->input('password'));


        $id = $data['id'];

		if(!$data){



		} else {

			try{

        		$str =DB::table('users')->where('id',$id)->update(['password'=>$res]);
        		

	             if($str){
	                 return redirect('/home/login')->with('success','修改成功');
	             }

	        } catch(\Exception $e){ 

	             return back()->with('error');

	        }

		}
    }
}
