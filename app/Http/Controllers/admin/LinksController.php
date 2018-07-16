<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Admin\Link;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Config;

class LinksController extends Controller
{
    /**
     * 列表展示页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //接收搜索关键字
        $search = $request -> input('search','');
        //查数据
        $count = DB::table('links')->count();
        $page_count = $request->input('page_count',2); 
         //获取数据
        $link = new Link();
        if(isset($search) && !empty($search)){
           $link = $link::where('name','like','%'.$search.'%');
        }
        $data = $link->paginate($page_count);
        //添加友情链接列表页
        return view('admin.link.index',['title'=>'','data'=>$data,'count'=>$count,'search'=>$request->all(),'request'=>$request]);
    }

    /**
     * 友情链接添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.create',['title'=>'友情链接添加']);
    }

    /**
     * 执行添加方法
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收传来的数据
        $link_data = $request ->except('_token');

        //创建文件上传对象
        if($request->hasFile('img')){
            //设置名字
            $name = str_random(4).time();

            //获取后缀
            $suffix = $request->file('img')->getClientOriginalExtension();

            //移动
            $request->file('img')->move('./uploads/',$name.'.'.$suffix);
        }

        $link_data['img'] = Config::get('app.path').$name.'.'.$suffix;

        $res= Link::create($link_data);

        if($res){
            return redirect('/admin/link')->with('success','添加成功'); //跳转 并且附带信息
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
     * 加载修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //通过id查询信息
        $data = Link::find($id);
        return view('admin.link.edit',['title'=>'友情链接修改','data'=>$data]);
    }

    /**
     * 修改方法
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //获取用户输入的信息
        $link_data = $request -> except('_token');
         //创建文件上传对象
        if($request->hasFile('img') == true){
            $img = $request -> file('img');
            $temp_name = time()+rand(10000,99999);
            $hz = $img -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            $as = $img -> move('/admin/guanggao',$filename);//执行上传
            $link_data['img'] = $as;
            $res = Link::find($id)->update(['name'=>$link_data['name'],'url'=>$link_data['url'],'img'=>$link_data['img']]);
            if($res){
            return redirect('/admin/link')->with('success','修改成功'); //跳转 并且附带信息
        }else{
            return back()->with('error','修改失败'); //跳转 并且附带信息
        }   

        }else{
            //如果不修改头像 查出数据库原有的图片
            $data = Link::find($id);
            $res = Link::find($id)->update(['name'=>$link_data['name'],'url'=>$link_data['url'],'img'=>$data['img']]);
            if($res){
            return redirect('/admin/link')->with('success','修改成功'); //跳转 并且附带信息

             }else{
                 return back()->with('error','修改失败');
             }
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
        //
    }
}
