<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Goods;
// use App\Http\Controllers\Cate;


class GoodsController extends Controller
{

    // public function good_list(Request $request)
    // {
        //接受商品类别的id
        // $data = $request ->all();
        // $id = $data['id'];
        //  // dump($id);
        // // print_r($data);
        // //获取所有商品分类
        // $cate = Cate::getCate(0);
        // //获取当前分类 名称
        // $good = Goods::where('tid',$id)->where('status','1')->where('gnum','>',1)->get();
        // $count = Goods::where('tid',$id)->count();
        // $tname =Cate::find($id)->tname;
        // //获取当前顶级分类名称
        // $pid = Cate::find($id)->pid;
        // $prename =Cate::find($pid)->tname;
        // dd($good);
        // $gdetial = Gdetail::where('tid',$id)->get();
        // return view('home.goods.index',['title'=>'商品的列表页']);

    // }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id');

        $goods=Goods::with('gs')->where("c_id",$id)->get();
       // 获取商品id

        // dd($gic);

         // dd($goods);

        //获取当前分类的名称
        // $good=DB::table('goods')->where("id",$id)->first();

        // $arr=explode(',',$good->path);

        // $size=count($arr)-1;

        // switch($size){
        //     case '1':
        //         break;
        //     case '2':
        //         break;
        //     case '3':
        //         $goods=DB::table('goods')->where('c_id',$id)->get();
        //         break;

        // }
        // dd($goods);



         // $goods = Goods::gs()->with('gid')
         //    ->where(function($query) use($req){
         //         //检测
         //        $gname = $req->input('search');

         //        $gid = $req->input('id');

         //        //如果不为空 
         //        if(!empty($gname)) {
         //            $query->where('gname','like','%'.$gname.'%');
         //        }
         //        //如果不为空
         //        if(!empty($gid)) {
         //            $query->where('c_id','like','%'.$gid.'%');
         //        }
         //    })
         //    ->get(); 
        // dump($request->all()); 
        // echo $request->input('id'); 
    // $goods=DB::table('goods')->where(function($query) use($request){ 
    //         $query->where('c_id',$request->input('id'));
    // })->get();
        // dump($goods);
        // echo $request->input('id');
        // $goods=Goods::where('c_id',$request->input('id'))->get();
        //     dump($goods)     

        return view('home.goods.index',['title'=>'商品列表页','goods'=>$goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     
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
