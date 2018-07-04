<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Http\Requests\FormRequest;
use Config;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
        $user = User::orderBy('id','ace')
            ->where(function($query) use($req){
                 //检测关键字和邮箱
                $uname = $req->input('search');
                $email = $req->input('email');

                //如果用户名不为空
                if(!empty($uname)) {
                    $query->where('uname','like','%'.$uname.'%');
                }
                //如果邮箱不为空
                if(!empty($email)) {
                    $query->where('email','like','%'.$email.'%');
                }
            })
            ->paginate($req->input('num', 5));

        return view('admin.user.index',[
                'title'=>'用户的列表页面',
                'res'=>$user, 
                'req'=> $req
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
        return view('admin.user.add',['title'=>'用户添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequest $request)
    {
        //
        $res = $request->except(['_token','header','repass']);

        //头像
        if($request->hasFile('header')){
            //设置名字
            $name = str_random(4).time();

            //获取后缀
            $suffix = $request->file('header')->getClientOriginalExtension();

            //移动
            $request->file('header')->move('./uploads/',$name.'.'.$suffix);
        }

        //存入数据表
        $res['header'] = Config::get('app.path').$name.'.'.$suffix;

        //密码加密
        $res['password'] = Hash::make($request->input('password'));

        //写入创建时间
        $res['register_at'] = time();

        //模型   出错
        try{
            $data = User::create($res);

            if($data){
                return redirect('/admin/user')->with('success','添加成功');
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
        $res = User::find($id);

        return view('admin.user.edit',[
            'title'=>'修改用户',
            'res'=>$res
            ]);

        // dump($res);

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
         //表单验证
        $this->validate($request, [
            'uname' => 'required|regex:/^\w{5,12}$/',
            'email'=>'email',
            'tel'=>'required|regex:/^1[3456789]\d{9}$/',

        ],[
            'uname.required'=>'用户名不能为空',
            'uname.regex'=>'用户名格式不正确',
            'email.email'=>'邮箱格式不正确',
            'tel.required'=>'手机号不能为空',
            'tel.regex'=>'手机号格式不正确'

        ]); 


        $res = $request->except(['_token','_method','register_at','header']);
       

        //头像
        if($request->hasFile('header')){
            //设置名字
            $name = str_random(4).time();

            //获取后缀
            $suffix = $request->file('header')->getClientOriginalExtension();

            //移动
            $request->file('header')->move('./uploads/',$name.'.'.$suffix);
        }

        if($request->hasFile('header')){
           $res['header'] = Config::get('app.path').$name.'.'.$suffix;  
        }
       
        try{

            $data = User::where('id',$id)->update($res);

            if($data){
                return redirect('/admin/user')->with('success','修改成功');
            }

        } catch(\Exception $e){ 

            return back()->with('error');

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
        $foo  = User::find($id);

        $urls = $foo->header;

        $info = unlink('.'.$urls);

        if(!$info)  return;

        $res = User::destroy($id);

        if($res){

            return redirect('/admin/user')->with('success','删除成功');

        }
    }
}
