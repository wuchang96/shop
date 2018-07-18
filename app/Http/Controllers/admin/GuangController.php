<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Guanggao;
use App\Models\Admin\Gcate;
use DB;
use Config;
class GuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $search = $request -> input('search','');//接收的广告名称
       $cid = $request -> input('cid','');//接收广告类别
       $count = DB::table('advresing')->count();
       $page_count = $request->input('page_count',2);

       $Guanggao =new Guanggao(); //创建数据对象
        if(isset($search) && !empty($search)){
          $Guanggao =  $Guanggao::where('acustomer','like','%'.$search.'%');
        } 
        if(isset($cid) && !empty($cid)){
          $Guanggao =  $Guanggao->where('cid',$cid);
        }

        $data = $Guanggao->paginate($page_count);

        return view('admin.guanggao.index',['title'=>'广告位','count'=>$count,'data'=>$data,'search'=>$request->all(),'cid'=>$cid,'request'=>$request]);

    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.guanggao.create',['title'=>'广告位添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //接受数据
        $data = $request -> except('_token','fileupload');

        if($request->hasFile('pic')){
            //设置名字
            $name = str_random(4).time();

            //获取后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            //移动
            $request->file('pic')->move('./uploads/',$name.'.'.$suffix);
        }

        $data['pic'] = Config::get('app.path').$name.'.'.$suffix;


        //处理时间戳

        if (!empty($data['date_max']) && isset($data['date_max'])) {
            $data['date_max'] = strtotime($data['date_max']);
        }

        // dd($data);
        // 执行添加
        $res= Guanggao::create($data);
        if ($res) {
            return redirect('/admin/guanggao')->with('success','添加成功');
        } else {
            return back()->with('error','添加失败');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        //获取所有修改信息
        $data = Guanggao::find($id);
        

        // dd($data);
        return view('admin.guanggao.edit',['data'=>$data,'title'=>'修改广告']);
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
        $all = Guanggao::find($id);
        //接回修改提交信息
        $data = $request -> except('_token','_method');
        // dd($data);

        if($request->hasFile('pic')){
            //设置名字
            $name = str_random(4).time();

            //获取后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            //移动
            $request->file('pic')->move('./uploads/',$name.'.'.$suffix);
        }

        $data['pic'] = Config::get('app.path').$name.'.'.$suffix;
        //若没有上传新图片,则获取原来相应的旧图片重新添加
        if ($data['pic'] == null) {
            $data['pic'] = $all->pic;
        }

        //处理时间戳

        if (!empty($data['date_max']) && isset($data['date_max'])) {
            $data['date_max'] = strtotime($data['date_max']);
        }

        // dd($data);
        //执行修改
        $res = Guanggao::where('id',$id)->update($data);
         if ($res) {
            return redirect('/admin/guanggao')->with('success','修改成功');
        } else {
            return back()->with('error','修改失败');
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
        //执行删除
        $car_data =Guanggao::find($id);
         $res = $car_data->delete();
        if($res){
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }    }

    /**
     * 修改状态
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request)
    {
        $all = $request -> except('_token');
        if ($all['astatus']==1) {
           $res = Guanggao::where('id',$all['id'])->update(['astatus'=>0]);
             if ($res) {
                $arr = ['status'=>0,'msg'=>'已下架'];
            } else{
                $arr = ['status'=>2,'msg'=>'状态修改失败'];
            } 
        } else {
            $res = Ad::where('id',$all['id'])->update(['astatus'=>1]);
             if ($res) {
                $arr = ['status'=>1,'msg'=>'已上架'];
            } else{
                $arr = ['status'=>2,'msg'=>'状态修改失败'];
            }  
        } 
        return $arr;
    }

}
