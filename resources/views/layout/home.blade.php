<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link type="text/css" rel="stylesheet" href="/home/css/style.css" />
    <!--[if IE 6]>
    <script src="js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    

    <script type="text/javascript" src="/home/js/jquery-1.11.1.min_044d0927.js"></script>
    <script type="text/javascript" src="/home/js/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="/home/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/home/js/menu.js"></script>    
        
    <script type="text/javascript" src="/home/js/select.js"></script>
    
    <script type="text/javascript" src="/home/js/lrscroll.js"></script>

    
    <script type="text/javascript" src="/home/js/iban.js"></script>
    <script type="text/javascript" src="/home/js/fban.js"></script>
    <script type="text/javascript" src="/home/js/f_ban.js"></script>
    <script type="text/javascript" src="/home/js/mban.js"></script>
    <script type="text/javascript" src="/home/js/bban.js"></script>
    <script type="text/javascript" src="/home/js/hban.js"></script>
    <script type="text/javascript" src="/home/js/tban.js"></script>
    
    <script type="text/javascript" src="/home/js/lrscroll_1.js"></script>       
<title>@yield('title')</title>
</head>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
    <div class="sou">
        <span class="fr">
            <span class="fl">
                @if(empty(Session::get('user')))
                   你好,请<a href="/home/login">登录</a>
                @else
                    你好,{{session('user.nickname')}}
                    <a href="/home/ucenter">个人中心</a>
                    <a href="/home/logout">退出</a> 
                @endif 

                <a href="Regist.html" style="color:#ff4e00;">免费注册</a>&nbsp;|&nbsp;<a href="/home/grorder">我的订单</a>&nbsp;|
            </span>
            <span class="ss">
                <div class="ss_list">
                    <a href="#">收藏夹</a>
                    <div class="ss_list_bg">
                        <div class="s_city_t"></div>
                        <div class="ss_list_c">
                            <ul>
                                <li><a href="/home/collect">我的收藏夹</a></li>
                            </ul>
                        </div>
                    </div>     
                </div>
            </span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/home/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<div class="top">


    <div class="logo"><a href="/"><img src="{{session('logo')}}" /></a></div>
                                            


    <div class="search">
        <form>
            <input type="text" value="" class="s_ipt" />
            <input type="submit" value="搜索" class="s_btn" />
        </form>                      
        <span class="fl">
        <a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
    </div>
</div>
<!--End Header End--> 
<!--Begin Menu Begin-->
<div class="menu_bg">
    <div class="menu">
        <!--Begin 商品分类详情 Begin-->    
        <div class="nav">
            @php
                $data = App\Models\Admin\Cate::getsubcate(0);
                $guang = App\Models\Admin\Guanggao::get();
            @endphp
            <div class="nav_t">全部商品分类</div>
            <div class="leftNav">
                <ul>
                    @foreach($data as $v)  
                    <li>
                        <div class="fj">
                            <span class="n_img"><span></span><img src="" /></span>
                            <span class="fl">{{$v->title}}</span>
                        </div>
                        <div class="zj">
                            <div class="zj_l">
                                @foreach($v->sub as $kk)
                                <div class="zj_l_c">
                                <h2>{{$kk->title}}</h2>
                                @foreach($kk->sub as $ks)
                                <a href="/home/cate?id={{$ks->id}}">{{$ks->title}}</a>|
                                @endforeach
                            </div>
                            @endforeach
                            </div>
                            <div class="zj_r">
                                @foreach($guang as $k=>$v)
                                <a href="{{$v['url']}}"><img src="{{$v['pic']}}" width="236" height="200" /></a>
                                
                                @endforeach
                            </div>
                        </div>
                    </li>
                   @endforeach   
                </ul>            
            </div>
        </div>  
        <!--End 商品分类详情 End-->                                                 
        <ul class="menu_r">
            <li><a href="Index.html">首页</a></li>
            <li><a href="Food.html">美食</a></li>
            <li><a href="Fresh.html">生鲜</a></li>
            <li><a href="HomeDecoration.html">家居</a></li>
            <li><a href="SuitDress.html">女装</a></li>
            <li><a href="MakeUp.html">美妆</a></li>
            <li><a href="Digital.html">数码</a></li>
            <li><a href="GroupBuying.html">团购</a></li>
        </ul>
        <div class="m_ad">中秋送好礼！</div>
    </div>
</div>
<!--End Menu End--> 

@section('content')
@show
<div class="b_btm_bg b_btm_c">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/home/images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/home/images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/home/images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;/" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/home/images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
        </div>
        </div>

    <!-- 友情链接-->
    <div style="margin:0px 155px">
        <p style="height: 100%;">
    @if(!empty($link))
    @foreach($link as $k=>$v)
        @if($v['img'])
        <a target="_blank" href="https://{{$v['url']}}" style="float:left;">
            <span style="display:bloak;">
                <img  src="{{URL::asset($v['img'])}}" style="width:70px;height:30px;border-radius:4px" /> 
                <b>|</b>
            </span>
        </a>
        
        @else
        <a target="_blank" href="https://{{$v['url']}}">
            <span style="margin-left:5px;">{{$v['name']}}</span>
        </a>
        <b>|</b>
        @endif
    @endforeach
    @endif
    </p>
    </div>

    <div class="btmbg">
        <div class="btm">
            备案/许可证编号：{{session('detial')}} 尤洪商城网: {{session('daddr')}}. 复制必究<br />
            <img src="/home/images/b_1.gif" width="98" height="33" /><img src="/home/images/b_2.gif" width="98" height="33" /><img src="/home/images/b_3.gif" width="98" height="33" /><img src="/home/images/b_4.gif" width="98" height="33" /><img src="/home/images/b_5.gif" width="98" height="33" /><img src="/home/images/b_6.gif" width="98" height="33" />
        </div>      
    </div>

@section('js')
@show
</body>
</html>