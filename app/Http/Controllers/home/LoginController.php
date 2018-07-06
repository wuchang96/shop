<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('home.login.login',[
    		'title'=>'登录'
    	]);
    }

    public function dologin()
    {

    }
}
