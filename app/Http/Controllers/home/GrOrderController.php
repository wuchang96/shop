<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Orders;
use DB;
use Session;

class GrOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $uid = Session::get('user.id');
        $data = Orders::where('u_id',$uid)->get();
        return view('home.grorder.index',['title'=>'我的订单','data'=>$data]);
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
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Orders::where('id',$id)->first();
        $data['status'] = 2;
        $add['id'] = $data['id'];
        $add['u_id'] = $data['u_id'];
        $add['name'] = $data['name'];
        $add['addr'] = $data['addr'];
        $add['tel'] = $data['tel'];
        $add['cnt'] = $data['cnt'];
        $add['create_at'] = $data['create_at'];
        $add['sum'] = $data['sum'];
        $add['umsg'] = $data['umsg'];
        $add['status'] = $data['status'];
        // dump($data);
       
         // dump($add);
        try{
            $res = Orders::where('id',$id)->update($add);
            if($str){
                 return redirect('home.grorder');
            }
        }catch(\Exception $e){

            return back();
        }
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
