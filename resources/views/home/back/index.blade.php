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
    <!-- <script type="text/javascript" src="/home/js/jquery-3.2.1.min.js"></script> -->
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
    <style>
      .mws-form-message {
          font-size: 12px;
          cursor: pointer;
          padding: 0px 8px 0px 45px;
          position: relative;
          vertical-align: middle;
          background-color: #f8f8f8;
          background-position: 12px 12px;
          background-repeat: no-repeat;
          margin-bottom: 12px;
          -webkit-border-radius: 3px;
          -moz-border-radius: 3px;
          border-radius: 3px;
      }

      .mws-form-message.warning {
        background-color: #fef0b1;
        border-color: #ddca76;
        color: #a98b15;
        }

      .l_user{
        width: 120px;
      }  

    </style>
    
  <title>{{$title}}</title>
</head>
<body>  

<!--Begin Login Begin-->
<div class="log_bg">	
    <div class="top">
        <div class="logo"><a href="Index.html"><img src="/home/images/logo.png" /></a></div>
    </div>
	<div class="login">
    	<div class="log_img"><img src="/home/images/l_img.png" width="611" height="425" /></div>
		<div class="log_c">
        	<form action="/home/npwd" method="post">
            <table border="0" style="width:370px; font-size:14px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr height="50" valign="top">
              	<td width="55">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:24px;">找回密码</span>
                </td>
              </tr>
              <tr height="70">
                <td>手机号</td>
                <td>
                  <input type="phone" value="" class="l_user" id="tel" name="tel" placeholder="请输入手机号码" />
                   <button id='but' style='width:90px;height:36px;font-size:14px'>获取验证码</button>
                </td>
              </tr>
              <tr height="70">
                <td>验证码</td>
                <td><input type="text" value="" class="l_pwd" name="code" /></td>
              </tr>
              <tr height="60">
              {{csrf_field()}}
              	<td>&nbsp;</td>
                <td><input type="submit" value="提交" class="log_btn" /></td>
              </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!--End Login End--> 
<!--Begin Footer Begin-->
<div class="btmbg">
    <div class="btm">
        备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
        <img src="/home/images/b_1.gif" width="98" height="33" /><img src="/home/images/b_2.gif" width="98" height="33" /><img src="/home/images/b_3.gif" width="98" height="33" /><img src="/home/images/b_4.gif" width="98" height="33" /><img src="/home/images/b_5.gif" width="98" height="33" /><img src="/home/images/b_6.gif" width="98" height="33" />
    </div>    	
</div>
<!--End Footer End --> 
<script>

   //获取button
    $('#but').click(function() {

        //获取手机号
        var number = $('input[name=tel]').val();

        $.get('/home/tel', {number: number},function(data){

            console.log(data);
        })

        return false;

    })

    var Cv = true;

    $('input[name=code]').blur(function(){

        var code = $(this).val();

        $.get('/home/code', {code:code},function(data) {

            if(data == '1'){

              Cv = false;

              alert('验证码错误!!!');

            }

        })

    })

    $(':submit').click(function(){

      if(Cv){
        
        return true;
      }
      return false;
    })

</script>   
</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
