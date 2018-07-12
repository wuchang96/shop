<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Goods;


class GoodsController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id');

        $goods=Goods::with('gs')->where("c_id",$id)->get();

        return view('home.goods.index',['title'=>'商品列表页','goods'=>$goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();

        $id = $data['id'];

        $add = Goods::with('gs')->where("id",$id)->get();

        
        return view('home.goods.show',['title'=>'商品的详情页','add'=>$add]);
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


       // // //获取商品信息
       //  $good=Goods::find($id);
        
        //  $goods=Goods::where('id',$id)->with('goods')->first();
        // dd($goods);

       //  //通过模型获取商品详情   
       //  $pics =json_decode($good->goods_goodspic->gpic);
       //  dd($pics);
       //  // 获取商品顶级分类
       //  $id = $good -> goods_cate() ->pid;
       //  $cate_name = Cate::find($c_id);
       //  $cate = $cate_name->title;
        // dd($_SERVER);
        // return view('home.goods.show',['title'=>'商品的详情页','goods'=>$goods]);
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
