@extends('layout.home')
@section('title',$title)
@section('content')

<script type="text/javascript" src="/home/js/n_nav.js"></script>
<script type="text/javascript" src="/home/js/num.js">
      var jq = jQuery.noConflict();
    </script>     
<script type="text/javascript" src="/home/js/shade.js"></script>



<div class="i_bg">  
    <div class="content mar_20">
    	<img src="images/img2.jpg" />        
    </div>
    
    <!--Begin 第二步：确认订单信息 Begin -->
  <form action="/home/order/create">
    <div class="content mar_20">
    	<div class="two_bg">
        	<div class="two_t">
            	<span class="fr"><a href="/home/cart">修改</a></span>商品列表
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="80">商品图片</td>
                <td class="car_th" width="400">商品名称</td>
                <td class="car_th" width="140">属性</td>
                <td class="car_th" width="150">购买数量</td>
                <td class="car_th" width="130">小计</td>
              </tr>

			@foreach ($res as $k => $v)

              <tr>
                <td>
                    <div class="c_s_img"><img src="{{$v->gimg}}" width="73" height="73" /></div>
                </td>
                 <td align="center">{{$v->name}}</td>
                <td align="center">{{$v->color}}&nbsp;{{$v->size}}</td>
                <td align="center">{{$v->cnt}}</td>
                <td align="center" style="color:#ff4e00;">￥{{$totals}}</td>
              </tr>

			@endforeach

            </table>
            <div class="two_t">
              <span class="fr"><a href="/home/addr/{{$data['id']}}/edit">修改</a></span>收货人信息
            </div>
            <table border="0" class="peo_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
           
              <tr>
                <td class="p_td" width="160">收货人姓名</td>
                <td width="395">{{$data['name']}}</td>
                <td class="p_td" width="160">手机</td>
                <td width="395">{{$data['tel']}}</td>
              </tr>
              <tr>
                <td class="p_td">详细信息</td>
                <td>{{$diz}}</td>
                <td class="p_td">邮政编码</td>
                <td>{{$data['zip']}}</td>
              </tr>
            </table>
            <table border="0" style="width:900px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="70">
                <td align="right">
                	<b style="font-size:14px;">商品总数:{{$sums}}&nbsp;&nbsp;应付款金额：<span style="font-size:22px; color:#ff4e00;">￥{{$totals}}</span></b>
                </td>
              </tr>
	              <tr height="70">
	                <td align="right"><a href="/home/order/{{Session::get('user.id')}}"><img src="images/btn_sure.gif" /></a></td>
	              </tr>
                {{ method_field('PUT') }}
            </table>
        </div>
    </div>
</form>
</div>

@endsection