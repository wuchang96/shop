<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\lunbo;
use App\Http\Requests;
use DB;

class LunboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取网站配置信息
        $data = lunbo::get();

        // 加载模板
        return view('admin.lunbo.index',['title'=>'轮播图列表','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.lunbo.create',['title'=>'轮播图添加']);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取输入的值
        $data = $request ->except('_token');
         //创建第一张轮播图上传对象
         if($request->hasFile('pic') == true){
            $pic = $request -> file('pic');
            $temp_name = time()+rand(10000,99999);
            $hz = $pic -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $aa = $pic -> move('./admin/imglunbo',$filename);
            $data['pic'] = $aa;
        }

        //实例化模型 添加数据
        $car_data = new lunbo;  
        if(!isset($data['pic'])) {
            $data['pic'] = './admin/imglunbo/321123.';

        }else{
            $car_data -> pic = $data['pic'];

        }
        $car_data -> url = $data['url'];
        $res = $car_data -> save();
        if($res){
            return redirect('/admin/lunbo')->with('success','添加成功'); 
        }else{
            return back()->with('errors','添加失败');
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
        $data = lunbo::find($id);
        /*dd($data);*/
        //添加修改页面
        return view('admin.lunbo.edit',['title'=>'轮播图修改','data'=>$data]);

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
        //获取输入的值
        $data = $request ->except('_token');
       //创建第一张轮播图上传对象
         if($request->hasFile('pic') == true){
            $pic = $request -> file('pic');
            $temp_name = time()+rand(10000,99999);
            $hz = $pic -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $a1 = $pic -> move('./admin/imglunbo',$filename);
            $data['pic'] = $a1;
         }
   
        $res = lunbo::find($id)->update(['pic' => $data['pic']]);
        if($res){
            return redirect('/admin/lunbo')->with('success','修改成功'); //跳转 并且附带信息
        }else{
            return back()->with('error','修改失败'); //跳转 并且附带信息
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //实例化数据表
        $car_data =lunbo::find($id);
         $res = $car_data->delete();
        if($res){
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
