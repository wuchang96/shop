<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Admin\User;
use Config;

class UcenterController extends Controller
{
    //
    public function ucenter()
    {	
    	$id = Session::get('user.id');

    	$res = User::where('id',$id)->first();


    	// dump($res);die;

    	return view('home.user.ucenter',[
    		'title'=>'个人中心',
    		'res'=>$res
    		]);
    }

    public function update(Request $request, $id)
    {
    	$res = $request->except(['_token','header']);

    	//头像
        if($request->hasFile('header')){
            //设置名字
            $name = str_random(4).time();

            //获取后缀
            $suffix = $request->file('header')->getClientOriginalExtension();

            //移动
            $request->file('header')->move('./uploads/',$name.'.'.$suffix);
        }

        if($request->hasFile('header')){
           $res['header'] = Config::get('app.path').$name.'.'.$suffix;  
        }

        try{

            $data = User::where('id',$id)->update($res);

            if($data){
                return redirect('/home/ucenter');
            }

        } catch(\Exception $e){ 

            return back()->with('error');

        }
    }
}
