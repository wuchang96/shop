<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Orders;
use App\Models\Admin\Odetails;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
         $order = Orders::orderBy('oid','ace')
            ->where(function($query) use($request){
                 //检测关键字和邮箱
                $id = $request->input('oid');
                $name = $request->input('name');

                //如果订单号不为空
                if(!empty($id)) {
                    $query->where('oid','like','%'.$id.'%');
                }
                //如果收货人不为空
                if(!empty($name)) {
                    $query->where('name','like','%'.$name.'%');
                }
            })
            ->paginate($request->input('num', 5));


        return view('admin.order.index',[
            'title'=>'订单列表',
            'order'=>$order,
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
        //
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
    public function edit($oid)
    {   
        // echo '12113';
        // $res = Orders::find($oid);
        $res = Orders::where('oid',$oid)->first();
        // dd($res);
        return view('admin.order.edit',['title'=>'修改订单','res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $res = $request ->except('_token','_method');
        try{
            $data = Orders::where('oid',$res['oid'])->update($res);
            if($data){
                return redirect('/admin/order')->with('success','修改成功');
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
    public function destroy($oid)
    {   
        $res = Orders::where('oid',$oid)->delete();

        $data = Odetails::where('oid',$oid)->delete();;
        
        if($data){

            return redirect('/admin/order')->with('success','删除成功');

        } 
    }

    public function details(Request $request ,$oid)
    {   

         $deta = Odetails::where('oid',$oid)->orderBy('oid','ace')
            ->where(function($query) use($request){
                 //检测关键字
                $id = $request->input('oid');
                $gname = $request->input('gname');
                //如果收货人不为空
                if(!empty($gname)) {
                    $query->where('gname','like','%'.$gname.'%');
                }
            })
            ->paginate($request->input('num', 5));
        
        // $deta=DB::table('odetails')->where('o_id',$id)->get();
        
        return view('admin.order.details',[
            'title'=>'订单详情',
            'deta'=>$deta,
            'request'=>$request
            ]);
    }

    public function fa($oid)
    {   
        $data =Orders::where('oid',$oid)->update(['status'=>'2']);
        return redirect('/admin/order');
    }
}
