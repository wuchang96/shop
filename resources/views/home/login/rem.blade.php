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


<title>{{$title}}</title>
</head>
<body>
<!--Begin Header Begin-->
<div class="soubg">
</div>
<!--End Header End-->
<!--Begin Login Begin-->
<div class="log_bg">
    <div class="top">
        <div class="logo"><a href="/"><img src="{{session('logo')}}" width="170px"/></a></div>
    </div>
	<div class="regist">
    	<div class="log_img"><img src="/home/images/l_img.png" width="611" height="425" />
      </div>
      <div class="content-wrap">
        <div class="container clearfix">
          <div class="style-msg2 successmsg">
              <div class="msgtitle" style='font-size:20px'>用户注册激活账号提醒:</div>
              <div class="sb-msg">
                  <ul>
                      <li style='font-size:17px;list-style:none'>您注册了云通讯账号请到注册时的邮箱进行激活该用户</li>
                  </ul>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!--End Login End-->
<!--Begin Footer Begin-->
<div class="btmbg">
    <div class="btm">
        备案/许可证编号：{{session('detial')}} 尤洪商城网: {{session('daddr')}}. 复制必究<br />
        <img src="/home/images/b_1.gif" width="98" height="33" /><img src="/home/images/b_2.gif" width="98" height="33" /><img src="/home/images/b_3.gif" width="98" height="33" /><img src="/home/images/b_4.gif" width="98" height="33" /><img src="/home/images/b_5.gif" width="98" height="33" /><img src="/home/images/b_6.gif" width="98" height="33" />
    </div>
</div>
<!--End Footer End -->

<script>
  
  $('.mws-form-message').fadeOut(5000);
</script>


</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
