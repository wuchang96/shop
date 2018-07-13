<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Cart;
use App\Models\home\Addr;
use App\Models\Admin\Orders;
use Session;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $uid = Session::get('user.id');

        // $res = Cart::get();
        


       // $aa = Session::get('user.id');  
       // $userinfo = session('UserInfo');
        $res = Cart::where('biaoji','1')->where('u_id',$uid)->get();
            // dd($res);
        $totals = 0;
        $sums = 0;

        foreach ($res as $k=> $v) {
            
            $totals += $v['cnt']*$v['price'];
            $sums += $v['sum'];

        }
        /*$request -> session() -> put('info1',$res);
        $request -> session() -> put('info2',$totals);
        $request -> session() -> put('info3',$sums);*/


        $data = Addr::where('uid',$uid)->where('status','0')->first();

        if (empty($data)) {
            return redirect('/home/addr/add')->with('error','请添加收货地址');
        }
       
        $str =  explode(",",$data['addr']);
        $diz = $str['0'].$str['1'].$str['2'].$str['3'];
        // dd($diz);
        // var_dump($addrs);
        // dd($addr);
        return view('home.order.index',[
            'title'=>'订单信息',
            'data'=>$data,
            'diz'=>$diz,
            'res'=>$res,
            'totals'=>$totals,
            'sums'=>$sums,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = Cart::where('biaoji','1')->where('u_id',$id)->get();
     
      $aa = [];
      $cnt = '';
      $sum = 0;
      foreach ($data as $k => $v) {
        $aa[$k]['gname'] = $v['name'];
        $aa[$k]['pic'] = $v['gimg'];
        $aa[$k]['price'] = $v['price'];
        $aa[$k]['cnt'] = $v['cnt'];
         $cnt += $v['cnt'];
         $sum += $v->price * $v->cnt;
      }

      $str = Addr::where('uid',$id)->where('status','0')->first();
  
      $res =  explode(",",$str['addr']);
      $diz = $res['0'].$res['1'].$res['2'].$res['3'];
      $abc = date('YmdHis').mt_rand(1000,9999);
      $uid = Session::get('user.id');
      $create_at = time();
      $add = [];
      $add['oid'] = $abc;
      $add['u_id'] = $uid;
      $add['name'] = $str['name'];
      $add['addr'] = $diz;
      $add['tel'] = $str['tel'];
      $add['cnt'] = $cnt;
      $add['create_at'] = $create_at;
      $add['sum'] = $sum;

      // dd($add);

      $order = Orders::create($add);
      // dump($order);die;
      $data = $order->odeta()->createMany($aa);
      // dd($data);

     //删除购物车
      $data = Cart::where('biaoji','1')->where('u_id',$id)->delete();
      
      return view('home/order/cheng',['order'=>$order]);


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
}
