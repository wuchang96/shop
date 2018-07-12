<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Cart;
use Session;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $uid = Session::get('UserInfo.id');
        // dd($uid);
        $res = Cart::get();
        return view('home.cart.index',['title'=>'购物车','res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   


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
        //
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

    public function ajaxcart(Request $request)
    {
        $id = $request->input('id');
        //构造器删除
        $data = Cart::where('id',$id)->delete();

        $count = Cart::count();

        echo $count;


    }

    public function ajaxjia(Request $request)
    {
        $data  =$request->input('xxoo');
        // dd($data);
        $cart = Cart::find($data);
        // var_dump($cart);
        $cart->cnt += 1;
        $cart = $cart -> save();

        if ($cart) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function ajaxjian(Request $request)
    {
        $data = $request->input('ooxx');
        // dd($data);
        $cart = Cart::find($data);
        $cart->cnt -= 1;

        if ($cart->cnt <= 1) {
            $cart->cnt = 1;
        }

        $cart = $cart -> save();

        if ($cart) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function ajaxdx(Request $request)
    {
       $data = $request->input('dan');
       $dete = $request->input('xuan');
       echo $data;
       echo $dete;

      
       if($data){

        $res = Cart::find($data);
        $res->biaoji = '1';
        $res = $res -> save();
            
       } 
       if(!$data && $dete) {

       $res = Cart::find($dete);
       $res->biaoji = '0';
       $res = $res -> save();
       }

    }
}
