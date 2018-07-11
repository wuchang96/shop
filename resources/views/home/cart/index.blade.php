@extends('layout.home')
@section('title',$title)
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')

<style>
  .cart-empty{
    height: 98px;
      padding: 80px 0 120px;
      color: #333;

  }

  .cart-empty .message{
    height: 98px;
      padding-left: 641px;
      background: url(/home/images/no-login-icon.png) 550px 22px no-repeat;
  }

  .cart-empty .message .txt {
      font-size: 14px;
  }
  .cart-empty .message li {
      line-height: 38px;
  }

  ol, ul {
      list-style: outside none none;
  }

  .ftx-05, .ftx05 {
    color: #005ea7;
  }
  
  a {
      color: #666;
      text-decoration: none;
      
      font-size:12px;
  } 
</style>


<script type="text/javascript" src="/home/js/n_nav.js"></script>
<script type="text/javascript" src="/home/js/num.js">
      var jq = jQuery.noConflict();
    </script>     
<script type="text/javascript" src="/home/js/shade.js"></script>


  <div class="i_bg">  
    <div class="content mar_20">
    	<img src="/home/images/img1.jpg" />        
    </div>
    
    <!--Begin 第一步：查看购物车 Begin -->
  

    <form method="post">
    @if(count($res) > 0)
    <div class="content mar_20 lamp203 ">
    	<table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
          <tr>
            <td class="car_th" width="40"><a href="javascript:void(0)" class='as'>全选</a></td>
            <td class="car_th" width="100">商品图片</td>
            <td class="car_th" width="250">商品名称</td>
            <td class="car_th" width="100">属性</td>
            <td class="car_th" width="100">单价</td>
            <td class="car_th" width="100">购买数量</td>
            <td class="car_th" width="100">价格</td>
            <td class="car_th" width="100">操作</td>
          </tr>
          @foreach($res as $k => $v)
          <tr>
            <td align="center">
               <input type="checkbox">
            </td>
            <td>
            	<div class="c_s_img"><img src="{{$v->gimg}}" width="73" height="73" /></div>
            </td>
            <td align="center"> {{$v->name}}</td>
            <td align="center">{{$v->color}}{{$v->size}}</td>
            <td align="center" style="color:#ff4e00;">
            ￥<span class="price">{{$v->price}}</span>
            </td>
            <td align="center">
            	<div class="c_num">
                    <input type="button" value="-"  class="car_btn_1" />
                	  <input type="text" value="{{$v->cnt}}" name="cnt" class="car_ipt" />  
                    <input type="button" value="+"  class="car_btn_2" />
                </div>
            </td>
            <td align="center" style="color:#ff4e00;">
              ￥<span class="xiaoji">{{$v->price}}</span>
            </td>

            <td align="center"><a href="javascript:void(0)" class="remove" ids='{{$v->id}}'>删除</a></td>
          </tr>
          @endforeach


          <tr height="70">
          	<td colspan="7" style="font-family:'Microsoft YaHei'; border-bottom:0;">
            	<!-- <label class="r_rad"><input type="checkbox" name="clear" checked="checked" /></label><label class="r_txt">清空购物车</label> -->
                <strong><span class="fr">商品总价：<b class="total" style="font-size:22px; color:#ff4e00;">￥0.0</b></span></strong>
            </td>
          </tr>
          <tr valign="top" height="150">
          	<td colspan="8" align="right">
            	<a href="/"><img src="images/buy1.gif" /></a>&nbsp; &nbsp; <button><a class="shu" href="/home/order"><img id="tj" src="images/buy2.gif" /></a></button>
            </td>
          </tr>

        </table>
      

    </div>
    </form>
	<!--End 第一步：查看购物车 End--> 
    
    
    <!--Begin 弹出层-删除商品 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="images/close.gif" /></span>
            </div>
            <div class="notice_c">
           		
                <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td>您确定要把该商品移除购物车吗？</td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td><a href="#" class="b_sure">确定</a><a href="#" class="b_buy">取消</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div> 
  @else   
    <div class="cart-empty">
          <div class="message">
              <ul>
                  <li class="txt">
                      购物车空空的哦~，去看看心仪的商品吧~
                  </li>
                  <li class="mt10">
                      <a href="/home/index" class="ftx-05">
                          去购物&gt;
                      </a>
                  </li>
                  
              </ul>
          </div>
    </div>  
  @endif
    
    
   
@endsection

@section('js')
<script>

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });


  //加法运算
  $('.car_btn_2').click(function(){

    //获取数量
    var num = $(this).prev().val();

    num++;
    //加完之后让数量发生改变
    $(this).prev().val(num);


    function accMul(arg1, arg2) {

          var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

          try { m += s1.split(".")[1].length } catch (e) { }

          try { m += s2.split(".")[1].length } catch (e) { }

          return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)

    }

    //获取单价
    var pc = $(this).parents('tr').find('.price').text();

    //加完之后让小计发生改变

    $(this).parents('tr').find('.xiaoji').text(accMul(pc,num));
  
    totals();
  })

  //减法运算
  $('.car_btn_1').click(function(){

    var mins = $(this).next().val();

    mins--;
    if(mins <= 1){

      mins = 1;
    }

    //减完让数量发生改变
    $(this).next().val(mins);

    //减完让小计发生改变
    //获取单价
    var pc = $(this).parents('tr').find('.price').text();

    function accMul(arg1, arg2) {

          var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

          try { m += s1.split(".")[1].length } catch (e) { }

          try { m += s2.split(".")[1].length } catch (e) { }

          return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)

    }

    //加完之后让小计发生改变

    $(this).parents('tr').find('.xiaoji').text(accMul(pc,mins));

    totals();

  })

  //单击多选框让总价发生改变
  $(':checkbox').click(function(){

    totals();

  })

  function totals()
  {

    var sum = 0;
    $(':checkbox:checked').each(function(){

      var pir = parseFloat($(this).parents('tr').find('.xiaoji').text());

      // sum += pir;

      function accAdd(arg1,arg2){  
          var r1,r2,m;  
          try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}  
          try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}  
          m=Math.pow(10,Math.max(r1,r2))  
          return (arg1*m+arg2*m)/m  
      }

      $('.total').text(sum = accAdd(sum, pir));
    })
  }


  //全选
  $('.as').click(function(){

    $(':checkbox').each(function(){

      // $(this).attr('checked','checked');
      $(this).attr('checked',true);
    })

    totals();
  })

  //删除
  $('.remove').click(function(){


    var rs = confirm('删除商品?');

    if(!rs) return;

    //获取id
    var id = $(this).attr('ids');

    var ts = $(this);


    //发送ajax
    $.post('/home/ajaxcart',{id:id},function(data){

      if(data != '0'){

        ts.parents('tr').remove();

        $('.total').text('0.0');

        totals();
        
      } else {

        $('.lamp203').html(`<div class="cart-empty">
            <div class="message">
                <ul>
                    <li class="txt">
                        购物车空空的哦~，去看看心仪的商品吧~
                    </li>
                    <li class="mt10">
                        <a href="/home/index" class="ftx-05">
                            去购物&gt;
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>`);
      }

    })

  })
 
  /* $('#tj').click(function(){
    var id = $('.shuid').attr('idc');
    console.log(id);
     var cnt = $('input[type=text][name=cnt]').val();
   $.post('',{cnt:cnt}function(data){

    })
    })*/

 
</script>
@endsection