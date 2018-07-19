<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Admin\Cate;
use App\Models\Admin\Goods;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * 执行查询
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //接受搜索的关键字
        $keyword = $request -> input('key');
        // 关键字为商品名称
        $data1 = Goods::where('gname','like','%'.$keyword.'%')->get();

        //存商品id
        $id = [];
        foreach ($data1 as $key => $value) {
            $id[] = $value->id;
        }
        // 关键字为一级分类
        // 存商品分类id
        $id = [];
        $tmp = Cate::where('title','like','%'.$keyword.'%')->get();

        foreach ($tmp as $k => $value) {
            $id[] = $value ->id;
        }
        
        // 用商品分类查询所有商品
         $data2 = Goods::whereIn('id',$id)->get();
         
        // 存下商品id
         foreach ($data2 as $key => $value) {
           $id[] = $value -> id;
         }
        // 去除重复id
        $id = array_unique($id);

        $count = count($id);

        $data = Goods::whereIn('id',$id)->where('status','1')->get();
        
        return view('home.search.index',['data'=>$data,'keyword'=>$keyword,'count'=>$count]);
      
        
        
        //     $goods = Goods::with('gimg')
        //     ->where(function($query) use($request){
        //         //检测关键字
        //         $gname = $request->input('search');
        //         $gid = $request->input('id');
        //         //如果商品不为空
        //         if(!empty($gname)) {
        //             $query->where('gname','like','%'.$gname.'%');
        //         }

        //         // 如果有类别id
        //         if(!empty($gid)){
        //             $query->where('tid','like','%'.$gid.'%');
        //         }  
        //     })->where('status','0')
        //     ->get();

        //     $res = Goods::with('gimg')
        //         ->where('id','<', 50)
        //         ->orderBy(DB::raw('RAND()'))
        //         ->take(12)
        //         ->get();
        // return view('home.search.index',[
        //     'title'=>'商品列表',
        //     'goods'=>$goods,
        //     'res'=>$res
        // ]);
        
       

    
    }
}

