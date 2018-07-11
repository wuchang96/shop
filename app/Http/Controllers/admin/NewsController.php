<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Models\Admin\News;
use App\Models\Admin\Link;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Config;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request -> input('search','');
        $count = DB::table('news')->count();
        $page_count = $request->input('page_count',3);
        $news = DB::table('news');
        if(isset($search) && !empty($search)){
           $news -> where('author','like','%'.$search.'%');
        }  
            $data = $news->orderBy('id','asc')->paginate($page_count);
            /*dd($data);*/
        return view('admin.news.index',['title'=>'新闻列表','count'=>$count,'data'=>$data,'count'=>$count,'search'=>$request->all()]);
    }
    /**
     * 新闻添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create',['title'=>'新闻添加']);
    }

    /**
     * 执行添加方法
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取输入的信息
        $news_data = $request -> except('_token');

        //创建文件上传对象
        if($request->hasFile('apic') == true ){
            //设置名字
            $name = str_random(4).time();

            //获取后缀
            $suffix = $request->file('apic')->getClientOriginalExtension();

            //移动
            $request->file('apic')->move('./uploads/',$name.'.'.$suffix);
        }

        $news_data['apic'] = Config::get('app.path').$name.'.'.$suffix;

        //实例化数据表
        $news = new News;
        $news -> title = $news_data['title'];
        $news -> apic = $news_data['apic'];
        $news -> content = $news_data['content'];
        $news -> author = $news_data['author'];
        $res = $news -> save();
         if($res){
            return redirect('/admin/news')->with('success','添加成功'); //跳转 并且附带信息
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
        //通过id查询信息
        $data = News::find($id);
        //加载显示模板
        return view('admin.news.show',['title'=>'新闻详情','data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取所有修改信息
        $data = News::find($id);
        
        // dd($data);
        return view('admin.news.edit',['data'=>$data,'title'=>'修改新闻']);
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
        //获取没修改之前的信息
        $all = News::find($id);
        //接回修改提交信息
        $data = $request -> except('_token','_method');
        // dd($data);

        if($request->hasFile('apic')){
            //设置名字
            $name = str_random(4).time();

            //获取后缀
            $suffix = $request->file('apic')->getClientOriginalExtension();

            //移动
            $request->file('apic')->move('./uploads/',$name.'.'.$suffix);
        }

        $data['apic'] = Config::get('app.path').$name.'.'.$suffix;

        //若没有上传新图片,则获取原来相应的旧图片重新添加
        if ($data['apic'] == null) {
            $data['apic'] = $all->apic;
        }

        // dd($data);
        //执行修改
        $res = News::where('id',$id)->update($data);
         if ($res) {
            return redirect('/admin/news')->with('success','修改成功');
        } else {
            return back()->with('error','修改失败');
        }
    }

    /**
     * 删除方法
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = News::find($id);
        $res = $data->delete();
        if($res){
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

	public function detail(Request $request)
    {
        //查询友情链接表信息
        $link = Link::get();
        //查询文章表内容
        $id = $request -> input('id');
        $content_data = News::find($id);
        //加载模板
        return view('admin.news.detail',['link'=>$link,'content_data'=>$content_data]);
    }

}
