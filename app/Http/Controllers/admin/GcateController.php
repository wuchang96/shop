<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Gcate;
class GcateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = Gcate::get();

        return view('admin.gcate.index',[
                'title'=>'广告列表页面',
                'res'=> $res
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gcate.add',['title'=>'广告类别添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $res = $request->except(['_token']);

        try{
            $data = Gcate::create($res);

            if($data){
                return redirect('/admin/gcate')->with('success','添加成功');
            }
        }catch(\Exception $e){

            return back();

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
        $res = Gcate::find($id);

        return view('admin.gcate.edit',[
            'title'=>'修改用户',
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
        $res = $request->except(['_token','_method']);


        try{

            $data = Gcate::where('id',$id)->update($res);

            if($data){
                return redirect('/admin/gcate')->with('success','修改成功');
            }

        } catch(\Exception $e){ 

            return back()->with('error');

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
        $res = Gcate::destroy($id);

        if($res){

            return redirect('/admin/gcate')->with('success','删除成功');

        }
    }
}
