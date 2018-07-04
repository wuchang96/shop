<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Cate;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res = Cate::select(DB::raw('*,concat(path,id) as paths'))->
            orderBy('paths')->
            where('title','like','%'.$request->input('search').'%')->
            paginate($request->input('num',5));

        foreach($res as $k => $v){
            //获取path
            // $paths = explode(',',$v->path);
            //$evl = count($paths)-2;

            $rs = substr_count($v->path,',')-1;

            $v->title = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$rs).'|--'.$v->title;
        }

        return view('admin.cate.index',[
            'title'=>'分类列表',
            'res'=>$res,
            'request'=>$request

        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res = Cate::select(DB::raw('*,concat(path,id) as paths'))->
            orderBy('paths')->
            get();
            
        foreach($res as $k => $v){
            //获取path
            // $paths = explode(',',$v->path);
            //$evl = count($paths)-2;

            $rs = substr_count($v->path,',')-1;

            $v->title = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$rs).'|--'.$v->title;
        }

        return view('admin.cate.add',['title'=>'添加类别','res'=>$res]);
        // echo '1234';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证

        $res=$request->except('_token');
       if($res['pid'] == '0'){

        $res['path'] = '0,';

       }else{
        $foo = Cate::where('id',$res['pid'])->first();

       $res['path']=$foo->path.$foo->id.',';
       
       }

       $data=Cate::create($res);
       
       if($data){
       
        return redirect('/admin/cate')->with('success','添加成功');
       
       }else{
        return back()->with('error','添加失败');
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
        $info = Cate::find($id);

        $res = Cate::select(DB::raw('*,concat(path,id) as paths'))->
            orderBy('paths')->
            get();
            
        foreach($res as $k => $v){
            //获取path
            // $paths = explode(',',$v->path);
            //$evl = count($paths)-2;

            $rs = substr_count($v->path,',')-1;

            $v->title = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$rs).'|--'.$v->title;
        }

        return view('admin.cate.edit',
            [
                'title'=>'分类修改',
                'res'=>$res,
                'info'=>$info
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
        $res = $request->except('_token','_method');

        try{
            $data = Cate::where('id',$id)->update($res);

            if($data){
                return redirect('/admin/cate')->with('success','修改成功');
            }
        }catch(\Exception $e){

            return back();

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
        $cate=Cate::where('pid','=',$id)->first();

        //
        //判断有没有子类
        //如果有子类不能删除
        if($cate){
            return redirect('/admin/cate')->with('error','删除失败');
        }

        try {
            $res = Cate::where('id',$id)->delete();
            //如果没有就可以删除

            if($res){
                return redirect('/admin/cate')->with(['success'=>'删除成功']);
            }

        } catch (\Exception $e) {

                return redirect('/admin/cate')->with('error','删除失败');
        }
    }
}
