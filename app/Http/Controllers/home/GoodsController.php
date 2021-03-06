<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Goods;
use App\Models\Admin\Guanggao;
use App\Models\Admin\Link;

use App\Models\Admin\Cate ;

use App\Models\Admin\Cate ;


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


        // 获取广告表信息
        $guang = Guanggao::get();

        // 获取友情链接表信息
        $link = Link::get();
        
        //获取当前分类 名称
        $count = Goods::where('c_id',$id)->count();
        $aa =Cate::find($id)->title;

        //获取当前顶级分类的名称
        $pid = Cate::find($id)->pid;
        $prename =Cate::find($pid)->title;

        


        return view('home.goods.index',['title'=>'商品列表页','goods'=>$goods,'prename'=>$prename,'count'=>$count,'aa'=>$aa,'guang'=>$guang,'link'=>$link

            
    ]);            
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

        // 获取广告表信息
        $guang = Guanggao::get();

        // 获取友情链接表信息
        $link = Link::get();
        
            //dd($add['descr']);

           // $arr = explode('<p><img src="',$add['descr']);
           //$arr=implode(',',$arr);
           //$arr=explode('style="" title="',$arr);
           //dump($add['descr']);
           // unset($arr[0]);
           // dd($arr);

           // $str=[];
           // $str[] = $arr['1'];
           // $str[] = $arr['3'];
           // $str[] = $arr['5'];
           // dd($str);

           // $trs = explode('/',$str['0']);
           // $aa ='/'.$trs['1'].'/'.$trs['2'].'/'.$trs['3'].'/'.$trs['4'].'/';
           // dd($str);
           // $trs[]=$str['1'];
            //查询商品评论表

            // $commentTot=DB::table("comment")->where("gid",$id)->count();
            // $goodTot=DB::table("comment")->where("start",">",4)->count();
            // $chaTot=DB::table("comment")->where("start","<=",2)->count();
            // $zhongTot=$commentTot-$goodTot-$chaTot;

            

            // $arr=array(
            //     "commentTot"=>$commentTot,
            //     "goodTot"=>$goodTot,
            //     "chaTot"=>$chaTot,
            //     "zhongTot"=>$zhongTot
                
            // );

            // $comment=DB::table("comment")->where("gid",$id)->get();

       
        return view('home.goods.show',[
            'title'=>'商品的详情页',
            'add'=>$add,
            'guang'=>$guang,
            'link'=>$link
            // 'arr'=>$arr
            // 'comment'=>$comment
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
