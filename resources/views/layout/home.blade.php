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

                <a href="/home/regist" style="color:#ff4e00;">免费注册</a>&nbsp;|&nbsp;<a href="/home/grorder">我的订单</a>&nbsp;|
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
    <div class="logo"><a href="/"><img src="{{session('logo')}}" width="170px" /></a></div>                              
    <div class="search">
        <form action="/home/search" method="get">
            {{ csrf_field() }}
            <input type="text" value="@if(!empty($keyword)){{$keyword}}@endif" name="key"  class="s_ipt keyword" placeholder="" />
            <input type="submit" value="搜索" class="s_btn" id = "isearch">
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
                                <a href="http://www.shop.com/home/goods/create?id=66"><img src="/uploads/3qmU1531791199.jpg" width="236" height="200" /></a>
                                <a href="http://www.shop.com/home/goods/create?id=55"><img src="/uploads/72hlh7OtBn1531998741.png" width="236" height="200" /></a>
                            </div>
                        </div>
                    </li>
                   @endforeach   
                </ul>            
            </div>
        </div>  
        <!--End 商品分类详情 End-->                                                 
        <ul class="menu_r">
            <li><a href="javascript:void(0)">首页</a></li>
            <li><a href="javascript:void(0)">美食</a></li>
            <li><a href="javascript:void(0)">生鲜</a></li>
            <li><a href="javascript:void(0)">家居</a></li>
            <li><a href="javascript:void(0)">女装</a></li>
            <li><a href="javascript:void(0)">美妆</a></li>
            <li><a href="javascript:void(0)">数码</a></li>
            <li><a href="javascript:void(0)">团购</a></li>
        </ul>
    </div>
</div>
<!--End Menu End--> 

@section('content')
@show
    <div class="b_btm_bg bg_color">
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
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/home/images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
        </div>
    </div>
    <div class="b_nav">
        <dl>                                                                                            
            <dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
            <dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
            <dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
            <dt><a href="#">服务保证</a></dt>
            <dd><a href="#">退换货原则</a></dd>
            <dd><a href="#">售后服务保证</a></dd>
            <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
            <dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
            <a href="#" class="b_sh1">新浪微博</a>            
            <a href="#" class="b_sh2">腾讯微博</a>
            <p>
            服务热线：<br />
            <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="/home/images/er.gif" width="118" height="118" /></div>
            <img src="/home/images/ss.png" />
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
    <!--End Footer End -->    
</div>

@section('js')
@show
</body>
</html>