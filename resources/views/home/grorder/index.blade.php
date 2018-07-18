<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="css/style.css" />
    <!--[if IE 6]>
    <script src="js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->
        
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>    
        
	<script type="text/javascript" src="js/select.js"></script>
        
    
<title>尤洪</title>
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
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<div class="m_top_bg">
    <div class="top">
        <div class="logo"><a href="/"><img src="{{session('logo')}}" /></a></div>
    </div>
</div>
<!--End Header End--> 
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
	<div class="m_content">
   		<div class="m_left">
        	<div class="left_n">管理中心</div>
            <div class="left_m">
            	<div class="left_m_t t_bg1">订单中心</div>
                <ul>
                	<li><a href="javascript:void(0)" class="now">我的订单</a></li>
                    <li><a href="/home/addr">收货地址</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg2">会员中心</div>
                <ul>
                	<li><a href="home/ucenter">用户信息</a></li>
                    <li><a href="/home/collect">我的收藏</a></li>
                </ul>
            </div>
        </div>
		<div class="m_right">
            <p></p>
            <div class="mem_tit">我的订单</div>
            <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tr>                                                                                                                                                    
                <td width="20%">订单号</td>
                <td width="25%">下单时间</td>
                <td width="15%">订单总金额</td>
                <td width="25%">订单状态</td>
                <td width="15%">操作</td>
              </tr>
              @foreach($data as $k => $v)
              <tr>
                <td><font color="#ff4e00">{{$v->oid}}</font></td>
                <td>{{date('Y-m-d',$v->create_at)}}</td>
                <td>￥{{$v->sum}}</td>
                <td>
                    @if($v->status == '0')
                        未发货
                    @elseif($v->status == '2') 
                        已发货
                    @elseif($v->status == '3')
                        已签收
                    @endif
                </td>

                <td>
                    <a href="/home/grorderxq/{{$v->oid}}">详情</a>
                    @if($v->status == '0')
                        <a href=""  onclick="return confirm('已通知商家!!!')">催单</a>
                    @elseif($v->status == '2') 
                        <a href="/home/grorder/{{$v->oid}}/edit">确认签收</a>
                    @elseif($v->status == '3')
                        交易完成 
                    @endif
                </td>
              </tr>

                {{csrf_field()}}
                {{method_field('PATCH')}}


               @endforeach
            </table>
        </div>
    </div>
	<!--End 用户中心 End--> 
    <!--Begin Footer Begin -->
    <div class="b_btm_bg b_btm_c">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
			<table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="images/b4.png" width="62" height="62" /></td>
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
            <img src="images/b_1.gif" width="98" height="33" /><img src="images/b_2.gif" width="98" height="33" /><img src="images/b_3.gif" width="98" height="33" /><img src="images/b_4.gif" width="98" height="33" /><img src="images/b_5.gif" width="98" height="33" /><img src="images/b_6.gif" width="98" height="33" />
        </div>    	
    </div>
    <!--End Footer End -->    
</div>

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
