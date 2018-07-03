<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserAddRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//开启自动验证
    }

    /**
     * 自定义验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:users|regex:/^[a-zA-Z]{1}[a-zA-Z0-9_]{5,17}$/',
            'upwd' => 'required|regex:/^[a-zA-Z0-9_]{6,18}$/',
            'tel' => 'required|regex:/^1{1}[\d]{10}$/',
            'email' => 'required|email'
        ];
    }
     /**
     * 自定义错误信息
     * @return [type] [description]
     */
    public function messages()
    {
        return [
            'username.required' => '用户必填', 
            'username.unique' =>'用户名存在', 
            'username.regex'=> '用户名不合法', 
            'upwd.required' => '密码必填', 
            'upwd.regex' => '密码不合法', 
            'tel.required' => '手机号必填', 
            'tel.regex' => '手机号不合法', 
            'email.required' => '邮箱必填', 
            'email.email' => '邮箱不合法', 
        ];
    }
}
