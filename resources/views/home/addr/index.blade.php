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
        
    <script type="text/javascript" src="/home/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/home/js/menu.js"></script>    
        
    <script type="text/javascript" src="/home/js/select.js"></script>
     



    
<title>尤洪</title>
</head>
<body>

<script type="text/javascript">

var Gid  = document.getElementById ;

var showArea = function(){

  Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +  

  Gid('s_city').value + " - 县/区" + 

  Gid('s_county').value + "</h3>"

              }

Gid('s_county').setAttribute('onchange','showArea()');

</script>





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
                <div class="ss_list">
                    <a href="#">客户服务</a>
                    <div class="ss_list_bg">
                        <div class="s_city_t"></div>
                        <div class="ss_list_c">
                            <ul>
                                <li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
                <div class="ss_list">
                    <a href="#">网站导航</a>
                    <div class="ss_list_bg">
                        <div class="s_city_t"></div>
                        <div class="ss_list_c">
                            <ul>
                                <li><a href="#">网站导航</a></li>
                                <li><a href="#">网站导航</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
            </span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
           
        </span>
    </div>
</div>
<div class="m_top_bg">
    <div class="top">
        <div class="m_logo"><a href="Index.html"><img src="{{session('logo')}}" /></a></div>

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
                    <li><a href="/home/grorder">我的订单</a></li>
                    <li><a href="javascript:void(0)" class="now">收货地址</a></li>
                </ul>
            </div>
            <div class="left_m">
                <div class="left_m_t t_bg2">会员中心</div>
                <ul>
                    <li><a href="/home/ucenter">用户信息</a></li>
                    <li><a href="/home/collect">我的收藏</a></li>
                </ul>
            </div>
            
        </div>
        <div class="m_right">
            <p></p>
            <div class="mem_tit">收货地址</div>
            <div class="address">
                <!-- <div class="a_close"><a href="#"><img src="images/a_close.png" /></a></div> -->
                <table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2" style="font-size:14px; color:#ff4e00;">你好:&nbsp; &nbsp; {{Session::get('user.uname')}}</td>
                  </tr>
                  <!--  @foreach($res as $k => $v)
                                    <tr>
                   <td align="right" width="80">收货人姓名：</td>
                   <td>{{$v->name}}</td>
                                    </tr>
                                    <tr>
                   <td align="right">收货地址：</td>
                   <td>{{$v->addr}}</td>
                                    </tr>
                                    <tr>
                   <td align="right">手机：</td>
                   <td>{{$v->tel}}</td>
                                    </tr>
                                    <tr>
                   <td align="right">邮编：</td>
                   <td>{{$v->zip}}</td>
                                    </tr>
                                    <tr>
                   <td align="right">是否为默认：</td>
                   <td>
                       @if ($v->status == 0)
                             是
                       @else
                             <a href="#" style="color:#ff4e00;">设为默认</a>
                       @endif
                   </td>
                                    </tr>
                                    <tr>
                   <td align="right"></td>
                   <td><br></td>
                                    </tr>
                                    @endforeach -->
                </table>
                <table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>收货人姓名</td>
                        <td>收货地址</td>
                        <td>收货人电话</td>
                        <td>邮政编码</td>
                        <td>是否为默认</td>
                        <td> &nbsp; &nbsp;  &nbsp; &nbsp;   &nbsp; &nbsp;操作</td>
                    </tr>
                     @foreach($res as $k => $v)
                    <tr>
                        <td>{{$v->name}}</td>
                        <td>{{$v->addr}}</td>
                        <td>{{$v->tel}}</td>
                        <td>{{$v->zip}}</td>
                        <td> 
                        @if ($v->status == 0)
                              是
                        @else
                             否 <!-- <a href="#" style="color:#ff4e00;">设为默认</a> -->
                        @endif
                        </td>
                        <td>
                        @if($v->status == 1)
                        <a href="/home/addrmo/{{$v->id}}" onclick="return confirm('确定要把此地址设为默认吗?')">设为默认</a>
                        @endif
                         &nbsp; &nbsp; 
                        <a href="/home/addrsc/{{$v->id}}" onclick="return confirm('确定删除吗?')">删除</a>
                         &nbsp; &nbsp; 
                        <a href="/home/addr/{{$v->id}}/edit">修改</a>
                        </td>
                    </tr>
                    @endforeach
                     {{method_field('DELETE')}}
                </table>
              <div class="mem_tit">
              <a href="/home/addr/add"><img src="images/add.png" /></a> &nbsp; &nbsp; 
            </div>
                
            <table></table>

            </div>
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
            <div class="b_er_c"><img src="images/er.gif" width="118" height="118" /></div>
            <img src="images/ss.png" />
        </div>
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
