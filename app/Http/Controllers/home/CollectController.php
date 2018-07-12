<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Goods;
use App\Models\Admin\Goodspic;
use App\Models\Home\Collect;
use Session;


class CollectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Collect::get();
        // dd($data);
        return view('home.collect.index',['title'=>'我的收藏','data'=>$data]);
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
        $uid = Session::get('user.id');
        $data = Goods::where('id',$id)->first();
        $str = Goodspic::where('gid',$id)->first();
         
        $add['g_id'] = $data['id']; 
        $add['u_id'] = $uid; 
        $add['name'] = $data['gname']; 
        $add['pic'] = $str['gpic'];
        $add['price'] = $data['price'];
        $add['color'] = $data['color'];
       // dump($add);
            // dd($res);
        try{
            $res = Collect::create($add);
            if($res){
                 return redirect('home/collect');
            }
        }catch(\Exception $e){

            return back();
        }
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
       
    }

    public function delete($id)
    {
        $data = Collect::where('id',$id)->delete();
        // dd($data);
        if ($data) {
            return redirect('/home/collect');
        }
    }
}
