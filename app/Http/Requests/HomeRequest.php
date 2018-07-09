<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'uname'    => 'required|regex:/^\w{5,12}$/',
            'password' => 'required|regex:/^\S{6,12}$/',
            'repass'   => 'same:password',
            'email'    => 'email',
            'tel'      => 'required|regex:/^1[3456789]\d{9}$/',
            'agreement'=> 'required',
        ];
    }

     /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'uname.required'    =>'用户名不能为空',
            'uname.regex'       =>'用户名格式不正确',
            'password.required' =>'密码不能为空',
            'password.regex'    =>'密码格式不正确',
            'repass.same'       =>'两次密码不一致',
            'email.email'       =>'邮箱格式不正确',
            'tel.required'      =>'手机号不能为空',
            'tel.regex'         =>'手机号格式不正确',
            'agreement.required'=>'请勾选用户协议',
        ];
    }
}
