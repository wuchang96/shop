@extends('layout.home')
@section('title',$title)
@section('content')
<script type="text/javascript" src="/home/js/n_nav.js"></script>
    
    <link rel="stylesheet" type="text/css" href="/home/css/ShopShow.css" />
    <link rel="stylesheet" type="text/css" href="/home/css/MagicZoom.css" />
    <script type="text/javascript" src="/home/js/MagicZoom.js"></script>
    
    <script type="text/javascript" src="/home/js/num.js">
    	var jq = jQuery.noConflict();
    </script>
        
    <script type="text/javascript" src="/home/js/p_tab.js"></script>
    
    <script type="text/javascript" src="/home/js/shade.js"></script>


<div class="i_bg">
	<div class="postion">
    	<span class="fl">全部 ></span>
    </div>    
    <div class="content">
    	                    
        <div id="tsShopContainer">
        	@foreach($add as $k=>$v)
            <div id="tsImgS"><a href="{{$v->gs[0]->gpic}}" title="Images" class="MagicZoom" id="MagicZoom"><img src="{{$v->gs[0]->gpic}}" width="390" height="390" /></a></div>
            @endforeach
            <div id="tsPicContainer">
                <div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div>
                <div id="tsImgSCon">
                    <ul>
                       	

                        <li onclick="showPic(1)" rel="MagicZoom"><img src="{{$v->gs[0]->gpic}}" tsImgS="" width="79" height="79" /></li>
                        <li onclick="showPic(1)" rel="MagicZoom"><img src="{{$v->gs[0]->gpic}}" tsImgS="" width="79" height="79" /></li>
                        <li onclick="showPic(1)" rel="MagicZoom"><img src="{{$v->gs[0]->gpic}}" tsImgS="" width="79" height="79" /></li>
                        <li onclick="showPic(1)" rel="MagicZoom"><img src="{{$v->gs[0]->gpic}}" tsImgS="" width="79" height="79" /></li>
                        
                    </ul>
                </div>
                <div id="tsImgSArrR" onclick="tsScrollArrRight()"></div>
            </div>
            <img class="MagicZoomLoading" width="16" height="16" src="/home/images/loading.gif" alt="Loading..." />				
        </div>
        
        <div class="pro_des">
        	<div class="des_name">
            	
            	@foreach($add as $k=>$v)
            		<p>{{$v->gname}}</p>
            	@endforeach
                “开业巨惠，北京专柜直供”，不光低价，“真”才靠谱！
            </div>
            <div class="des_price">
            	本店价格：<b>￥{{$v->price}}</b><br />
                消费积分：<span>28R</span>
            </div>
            <div class="des_choice">
            	<span class="fl">型号选择：</span>
                <ul>
                	<li class="checked">唯一<div class="ch_img"></div></li>
                    
                </ul>
            </div>
            <div class="des_choice">
            	<span class="fl">颜色选择：</span>
                <ul>
                	
                    <li class="checked">{{$v->color}}<div class="ch_img"></div></li>
                   
                </ul>
            </div>
            <div class="des_share">
            	<div class="d_sh">
                	分享
                    <div class="d_sh_bg">
                    	<a href="#"><img src="/home/images/sh_1.gif" /></a>
                        <a href="#"><img src="/home/images/sh_2.gif" /></a>
                        <a href="#"><img src="/home/images/sh_3.gif" /></a>
                        <a href="#"><img src="/home/images/sh_4.gif" /></a>
                        <a href="#"><img src="/home/images/sh_5.gif" /></a>
                    </div>
                </div>
                <div class="d_care"><a href="/home/cart/{{$v->id}}" onclick="ShowDiv('MyDiv','fade')">关注商品</a></div>
            </div>
            <div class="des_join">
            	<div class="j_nums">
                	<input type="text" value="1" name="" class="n_ipt" />
                    <input type="button" value="" onclick="addUpdate(jq(this));" class="n_btn_1" />
                    <input type="button" value="" onclick="jianUpdate(jq(this));" class="n_btn_2" />   
                </div>
                <span class="fl"><a href="/home/cart/{{$v->id}}"><img src="/home/images/j_car.png" /></a></span>
            </div>            
        </div>    
        
          
        
        
    </div>
    <div class="content mar_20">
    	<div class="l_history">
        	<div class="fav_t">用户还喜欢</div>
        	<ul>
                @foreach($guang as $v)
                <li>
                    <div class="img"><a href="{{$v['url']}}"><img src="{{$v['pic']}}" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">{{$v['atitle']}}</a></div>
                    <div class="price">
                        <font>￥<span>{{$v['aprice']}}</span></font> &nbsp; 
                    </div>
                </li>
                @endforeach
                
            </ul>
        </div>
        <div class="l_list">        	
           
            <div class="des_border">
                <div class="des_tit">
                	<ul>
                    	<li class="current"><a href="#p_attribute">商品属性</a></li>
                        <li><a href="#p_details">商品详情</a></li>
                        <li><a href="#p_comment">商品评论</a></li>
                    </ul>
                </div>
                <div class="des_con" id="p_attribute">
                	
                	<table border="0" align="center" style="width:100%; font-family:'宋体'; margin:10px auto;" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>商品名称：{{$v->gname}}</td>
                        <td>商品编号：1546211</td>
                        <td>品牌： {{$v->gname}}</td>
                        
                        

                      </tr>

                      <tr>
                        
                        <td>商品产地：法国</td>
                        <td>商品的状态:
                       		@if($v->status == '1')
                            上架
                            
                            @else
                            下架
                            
                            @endif
                        </td>
                        <tr>
                        <td>商品库存：{{$v->stock}}</td>
                        
                        
                        

                        </tr>
                        <td>&nbsp;</td>
                      </tr>
                      
                      
                    </table>                                               
                                            
                        
                </div>
          	</div>  
            
            <div class="des_border" id="p_details">
                <div class="des_t">商品详情</div>
                <div class="des_con">
                	<table border="0" align="center" style="width:745px; font-size:14px; font-family:'宋体';" cellspacing="0" cellpadding="0">
                      <tr>
                      	@foreach($add as $k=>$v)
                        <td width="265">
                        	<img src="{{$v->gs[0]->gpic}}" width="406" height="412" />
                        </td>
                        @endforeach
                        <td>
                        	<b>{{$v->gname}}</b><br />
                            
                            
                            【商品日期】：与专柜同步更新<br />
                            【商品产地】：法国<br />
                            【商品包装】：无外盒 无塑封<br />
                           
                            
                        </td>
                      </tr>
                    </table>
                    
                    @foreach($add as $k=>$v)
                    <p align="center">
                    
                    <img src="{{$v->gs[0]->gpic}}" width="750" height="409" />
					</p>
					@endforeach
                    
                </div>
          	</div>  
            
            <div class="des_border" id="p_comment">
            	<div class="des_t">商品评论</div>
                
                <table border="0" class="jud_tab" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="175" class="jud_per">
                    	<p>80%</p>好评度
                    </td>
                    <td width="300">
                    	<table border="0" style="width:100%;" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="90">好评<font color="#999999">80%</font></td>
                            <td><img src="/home/images/pl.gif" align="absmiddle" /></td>
                          </tr>
                          <tr>
                            <td>中评<font color="#999999">20%</font></td>
                            <td><img src="/home/images/pl.gif" align="absmiddle" /></td>
                          </tr>
                          <tr>
                            <td>差评<font color="#999999">0%</font></td>
                            <td><img src="/home/images/pl.gif" align="absmiddle" /></td>
                          </tr>
                        </table>
                    </td>
                    <td width="185" class="jud_bg">
                    	购买过在收到商品才可以对该商品发表评论
                    </td>
                    <td class="jud_bg">您可对已购买商品进行评价<br /><a href="#"><img src="/home/images/btn_jud.gif" /></a></td>
                  </tr>
                </table>
                
                
                				
                <table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
                 
                  
                  <tr valign="top">
                    <td width="160"><img src="/home/images/peo3.jpg" width="20" height="20" align="absmiddle" />&nbsp;</td>
                    <td width="180">
                    	商品：<font color="#999999"></font> <br />
                        星级评价：<font color="#999999"></font>
                    </td>
                    <td>
                    	<br />
                        <font color="#999999"></font>
                    </td>
                  </tr>
                  
                </table>

                	
                    
                
          	</div>
            
            
        </div>
    </div>
    
    
    <!--Begin 弹出层-收藏成功 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="/home/images/close.gif" /></span>
            </div>
            <div class="notice_c">
           		
                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="40"><img src="/home/images/suc.png" /></td>
                    <td>
                    	<span style="color:#3e3e3e; font-size:18px; font-weight:bold;">您已成功收藏该商品</span><br />
                    	<a href="#">查看我的关注 >></a>
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                  	<td>&nbsp;</td>
                    <td><a href="#" class="b_sure">确定</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-收藏成功 End-->
    
    
    <!--Begin 弹出层-加入购物车 Begin-->
    <div id="fade1" class="black_overlay"></div>
    <div id="MyDiv1" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv_1('MyDiv1','fade1')"><img src="/home/images/close.gif" /></span>
            </div>
            <div class="notice_c">
           		
                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="40"><img src="/home/images/suc.png" /></td>
                    <td>
                    	<span style="color:#3e3e3e; font-size:18px; font-weight:bold;">宝贝已成功添加到购物车</span><br />
                    	购物车共有1种宝贝（3件） &nbsp; &nbsp; 合计：1120元
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                  	<td>&nbsp;</td>
                    <td><a href="#" class="b_sure">去购物车结算</a><a href="#" class="b_buy">继续购物</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-加入购物车 End-->
    
    
    

<script src="/home/js/ShopShow.js"></script>


@endsection