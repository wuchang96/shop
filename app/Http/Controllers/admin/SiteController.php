<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;

class SiteController extends Controller
{
    //
    public function index()
    {	
    	$res = DB::table('site')->get();

    	return view('admin.site.index',[
    		'title'=>'站点列表',
    		'res'=>$res
    	]);
    }

    public function edit($id)
    {	
    	$res = DB::table('site')->find($id);
    	return view('admin.site.edit',[
    		'title'=>'修改站点',
    		'res'=>$res
    	]);
    }

    public function update(Request $request, $id)
    {
    	 $res = $request->except(['_token','_method','logo']);


    	 //头像
        if($request->hasFile('logo')){
            //设置名字
            $name = str_random(4).time();

            //获取后缀
            $suffix = $request->file('logo')->getClientOriginalExtension();

            //移动
            $request->file('logo')->move('./uploads/',$name.'.'.$suffix);
        }

        if($request->hasFile('logo')){
           $res['logo'] = Config::get('app.path').$name.'.'.$suffix;  
        }

        try{

            $data = DB::table('site')->where('id',$id)->update($res);

            if($data){
                return redirect('/admin/site')->with('success','修改成功');
            }

        } catch(\Exception $e){ 

            return back()->with('error');

        }
    }

    public function detail($id)
    {
    	$res = DB::table('site')->find($id);
    	return view('admin.site.detail',[
    		'title'=>'站点详情',
    		'res'=>$res
    	]);
    }
}
