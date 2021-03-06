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
       $page_count = $request->input('page_count',3);

       $Guanggao =new Guanggao(); //创建数据对象
        if(isset($search) && !empty($search)){
          $Guanggao =  $Guanggao::where('acustomer','like','%'.$search.'%');
        } 
        if(isset($cid) && !empty($cid)){
          $Guanggao = $Guanggao->where('cid',$cid);
        }
       
        $res = $Guanggao->paginate($page_count);

        $data = Gcate::get();

        return view('admin.guanggao.index',[
                'title'=>'广告位',
                'count'=>$count,
                'search'=>$request->all(),
                'cid'=>$cid,
                'res'=>$res,  
                'request'=>$request,
                'data'=>$data
            ]);

    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res = Gcate::get();

        return view('admin.guanggao.create',[
            'title'=>'广告位添加',
            'res'=>$res
            ]);
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

        $cid = $data['cid'];

        
        
        $res = Gcate::get();

        // dd($res);die;
        return view('admin.guanggao.edit',[
            'title'=>'修改广告',
            'data'=>$data,
            'res'=>$res        
        ]);
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

        if($request->hasFile('pic')){
            //设置名字
            $name = str_random(4).time();

            //获取后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            //移动
            $request->file('pic')->move('./uploads/',$name.'.'.$suffix);

            $data['pic'] = Config::get('app.path').$name.'.'.$suffix;
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
        }    
    }

    /**
     * 修改状态
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
