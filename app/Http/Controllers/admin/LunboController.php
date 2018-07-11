<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Lunbo;
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
        $data = Lunbo::get();

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

        //创建轮播图上传对象①
        if($request->hasFile('pic_1') == true){
            $pic_1 = $request -> file('pic_1');
            $temp_name = time()+rand(10000,99999);
            $hz = $pic_1 -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $aa = $pic_1 -> move('./admin/imglunbo',$filename);
            $data['pic_1'] = $aa;
        }

        //创建轮播图上传对象②
        if($request->hasFile('pic_2') == true){
            $pic_2 = $request -> file('pic_2');
            $temp_name = time()+rand(10000,99999);
            $hz = $pic_2 -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $bb = $pic_2 -> move('./admin/imglunbo',$filename);
            $data['pic_2'] = $bb;
        }

        //创建轮播图上传对象③
        if($request->hasFile('pic_3') == true){
            $pic_3 = $request -> file('pic_3');
            $temp_name = time()+rand(10000,99999);
            $hz = $pic_3 -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $cc = $pic_3 -> move('./admin/imglunbo',$filename);
            $data['pic_3'] = $cc;
        }

        //创建轮播图上传对象④
        if($request->hasFile('pic_4') == true){
            $pic_4 = $request -> file('pic_4');
            $temp_name = time()+rand(10000,99999);
            $hz = $pic_4 -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $dd = $pic_4 -> move('./admin/imglunbo',$filename);
            $data['pic_4'] = $dd;
        }

        //创建轮播图上传对象⑤
        if($request->hasFile('pic_5') == true){
            $pic_5 = $request -> file('pic_5');
            $temp_name = time()+rand(10000,99999);
            $hz = $pic_5 -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $ee = $pic_5 -> move('./admin/imglunbo',$filename);
            $data['pic_5'] = $ee;
        }

        //创建轮播图上传对象⑥
        if($request->hasFile('pic_6') == true){
            $pic_6 = $request -> file('pic_6');
            $temp_name = time()+rand(10000,99999);
            $hz = $pic_6 -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $ff = $pic_6 -> move('./admin/imglunbo',$filename);
            $data['pic_6'] = $ff;
        }

        //实例化模型 添加数据
        $car_data = new Lunbo;    
        if(!isset($data['pic_1']) && !isset($data['pic_2']) && !isset($data['pic_3']) && !isset($data['pic_4']) && !isset($data['pic_5']) && !isset($data['pic_6'])){
            $data['pic_1'] = './admin/imglunbo/1531361714.jpg';
            $data['pic_2'] = './admin/imglunbo/1531361714.jpg';
            $data['pic_3'] = './admin/imglunbo/1531361714.jpg';
            $data['pic_4'] = './admin/imglunbo/1531361714.jpg';
            $data['pic_5'] = './admin/imglunbo/1531361714.jpg';
            $data['pic_6'] = './admin/imglunbo/1531361714.jpg';
        }else{
            $car_data -> pic_1 = $data['pic_1'];
            $car_data -> pic_2 = $data['pic_2'];
            $car_data -> pic_3 = $data['pic_3'];
            $car_data -> pic_4 = $data['pic_4'];
            $car_data -> pic_5 = $data['pic_5'];
            $car_data -> pic_6 = $data['pic_6'];
        }
        $car_data -> url_1 = $data['url_1'];
        $car_data -> url_2 = $data['url_2'];
        $car_data -> url_3 = $data['url_3'];
        $car_data -> url_4 = $data['url_4'];
        $car_data -> url_5 = $data['url_5'];
        $car_data -> url_6 = $data['url_6'];
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
        $data = Lunbo::find($id);
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

        //创建轮播图上传对象①
        if($request->hasFile('pic_1') == true){
            $pic_1 = $request -> file('pic_1');
            $temp_name = time()+rand(10000,99999);
            $hz = $pic_1 -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $aa = $pic_1 -> move('./admin/imglunbo',$filename);
            $data['pic_1'] = $aa;
        }

        //创建轮播图上传对象②
        if($request->hasFile('pic_2') == true){
            $pic_2 = $request -> file('pic_2');
            $temp_name = time()+rand(10000,99999);
            $hz = $pic_2 -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $bb = $pic_2 -> move('./admin/imglunbo',$filename);
            $data['pic_2'] = $bb;
        }

        //创建轮播图上传对象③
        if($request->hasFile('pic_3') == true){
            $pic_3 = $request -> file('pic_3');
            $temp_name = time()+rand(10000,99999);
            $hz = $pic_3 -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $cc = $pic_3 -> move('./admin/imglunbo',$filename);
            $data['pic_3'] = $cc;
        }

        //创建轮播图上传对象④
        if($request->hasFile('pic_4') == true){
            $pic_4 = $request -> file('pic_4');
            $temp_name = time()+rand(10000,99999);
            $hz = $pic_4 -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $dd = $pic_4 -> move('./admin/imglunbo',$filename);
            $data['pic_4'] = $dd;
        }

        //创建轮播图上传对象⑤
        if($request->hasFile('pic_5') == true){
            $pic_5 = $request -> file('pic_5');
            $temp_name = time()+rand(10000,99999);
            $hz = $pic_5 -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $ee = $pic_5 -> move('./admin/imglunbo',$filename);
            $data['pic_5'] = $ee;
        }

        //创建轮播图上传对象⑥
        if($request->hasFile('pic_6') == true){
            $pic_6 = $request -> file('pic_6');
            $temp_name = time()+rand(10000,99999);
            $hz = $pic_6 -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            //执行上传
            $ff = $pic_6 -> move('./admin/imglunbo',$filename);
            $data['pic_6'] = $ff;
        }

   
        $res = Lunbo::find($id)->update(['pic_1' => $data['pic_1'],'pic_2' => $data['pic_2'],'pic_3' => $data['pic_3'],'pic_4' => $data['pic_4'],'pic_5' => $data['pic_5'],'pic_6' => $data['pic_6']]);
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
        $car_data =Lunbo::find($id);
         $res = $car_data->delete();
        if($res){
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
