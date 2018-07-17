<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Comment;
use App\Http\Requests\FormRequest;
use DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //多表查询
        $data= DB::table('comment')
                ->select("comment.*","goods.gname","users.uname")
                ->join("users","users.id",'=',"comment.uid")
                ->join("goods","goods.id",'=',"comment.gid")
                ->get();
        
       // 加载页面

        return view("admin.comment.index",['title'=>"评论管理",'data'=>$data]);
    }
    //ajax修改状态
    public function ajaxStatu(Request $request)
    {
        
        $arr=$request->except("_token");
       
        // dd($arr);
        // $sql="update comment set statu=$arr[statu] where id=$arr[id]";

        $res = DB::table('comment')->where('id',$arr['id'])->update(['statu'=>$arr['statu']]);

        if($res){
            return 1;
        }else{
            return 0;
        }
    }

}
