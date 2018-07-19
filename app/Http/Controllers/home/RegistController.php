<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder; 
use Gregwar\Captcha\PhraseBuilder;
use App\Http\Requests\HomeRequest;
use Session;
use Hash;
use App\Models\Admin\User;
use Mail;

class RegistController extends Controller
{
    //
    public function regist()
    {
    	return view('home.login.regist',['title'=>'注册']);
    }

    public function store(Request $request)
    {   
        $this->validate($request,[
            'uname'    => 'required|regex:/^\w{5,12}$/',
            'password' => 'required|regex:/^\S{6,12}$/',
            'repass'   => 'same:password',
            'email'    => 'email',
            'tel'      => 'required|regex:/^1[3456789]\d{9}$/',
            'agreement'=> 'required',
        ],[
            'uname.required'    =>'用户名不能为空',
            'uname.regex'       =>'用户名格式不正确',
            'password.required' =>'密码不能为空',
            'password.regex'    =>'密码格式不正确',
            'repass.same'       =>'两次密码不一致',
            'email.email'       =>'邮箱格式不正确',
            'tel.required'      =>'手机号不能为空',
            'tel.regex'         =>'手机号格式不正确',
            'agreement.required'=>'请勾选用户协议',
        ]);

        $res = $request->except(['_token','agreement','repass']);
        
        $phone = User::where('tel',$res['tel'])->first();
        if ($phone) {
             return back()->with('error','应手机号已绑定');
            // return redirect('home/regist')->with('error','应手机号已绑定');
        }

        $res['password'] = Hash::make($request->input('password'));

        $res['auth'] = 1;

        $res['register_at'] = time();            

        $res['token'] = str_random(50);

        $data = User::create($res);

        $id = $data->id;

        $token = $data->token;

        if($data){

            //发送邮件
            Mail::send('email.remind', ['id'=>$id,'token'=>$token], function($m) use ($res) {

                $m->from(env('MAIL_USERNAME'), '网上购物');

                $m->to($res['email'], $res['uname'])->subject('账号激活');
            });

            return view('home.login.rem',['title'=>'提醒']);

        }
    }



    public function jihuo(Request $request)
    {
        $id = $request->input('id');

        $token = $request->input('token');

        $data = User::where('id',$id)->first();

        if($data->token != $token){

            abort(404);

        }

        $res['auth'] = '0';

        $into = User::where('id',$id)->update($res);

        if($into){

            return redirect('home/login')->with('success','激活成功');

        }

        
    }

    public function captcha()
    {
 
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        Session::flash('code', $phrase);
        // 生成图片   此处要设置浏览器不要缓存
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();die;
    }
}
