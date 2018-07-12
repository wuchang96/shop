<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\home\Addr;
use Session;

class AddrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $uid = Session::get('user.id');
        $res = Addr::where('uid',$uid)->where('status','0')->get();
        $id = '';
        foreach ($res as $k => $v) {
           $id = $v->id;
        }
        
        // dd($id);
        return view('home.addr.index',['res'=>$res,'id'=>$id]);
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
        $uid = Session::get('user.id');
        $data = $request->except('_token');

        $data['uid']  = $uid;
        $addrs = $data['s_province'].','.$data['s_city'].','.$data['s_county'].','.$data['addr'];
        $data['addr'] = $addrs;
        // dd($res);
       try{
            $res = Addr::create($data);
            if($res){
                return redirect('/home/addr');
            }
        }catch(\Exception $e){

            return back();

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('home.addr.add');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data = Addr::where('id',$id)->first();
       $str =  explode(",",$data['addr']);
       // dd($data);
       return view('home.addr.edit',[
        'title'=>'修改地址',
        'data'=>$data,
        'str'=>$str
        ]);
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
        $data = $request->except('_token','_method');
        $uid = Session::get('user.id');
        $data['uid']  = $uid;
        $res = $data['s_province'].','.$data['s_city'].','.$data['s_county'].','.$data['addr'];
        $data['addr'] = $res;
        $add['name'] = $data['name'];
        $add['tel'] = $data['tel'];
        $add['uid'] = $data['uid'];
        $add['addr'] = $data['addr'];
        $add['zip'] = $data['zip'];
       /* dd($data);*/
       try{
            $str = Addr::where('id',$id)->update($add);
            if($str){
                return redirect('/home/addr');
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
    public function destroy($id)
    {
        //
    }
}
