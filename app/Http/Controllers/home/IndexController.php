<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cate;
use App\Models\admin\Lunbo;
use App\Models\admin\News;
use App\Models\admin\Guanggao;
use App\Models\admin\link;
use DB;
use Session;

class IndexController extends Controller
{
    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // 获取友情链接表信息
        $link = Link::get();

        // 获取轮播图表信息
        $lunbo=Lunbo::get();

        // 获取新闻表信息
        $news = News::get();

        // 获取广告表信息
        $guang = Guanggao::get();

        // 网站表信息
        $site = DB::table('site')->first();

        // session(['site'=>$site]);

        session(['logo'=>$site->logo]);
        session(['daddr'=>$site->daddr]);
        session(['detial'=>$site->detial]);


        return view('home.index.index',[
            'title'=>'尤洪',
            'lunbo'=>$lunbo,
            'news'=>$news,
            'guang'=>$guang,
            'link'=>$link
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
