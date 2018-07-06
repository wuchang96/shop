<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistController extends Controller
{
    //
    public function regist()
    {
    	return view('home.login.regist',['title'=>'注册']);
    }

    public function store(Request $request)
    {
    	$res = $request->except(['_token']);

    	dump($res);
    }
}
