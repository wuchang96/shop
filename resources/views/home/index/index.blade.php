@extends('layout.home')
@section('title',$title)
@section('content')
<div class="i_bg bg_color">
	<div class="i_ban_bg">
		<!--Begin Banner Begin-->
    	<div class="banner">    	
            <div class="top_slide_wrap">
                <ul class="slide_box bxslider">
                    @foreach($lunbo as $k=>$v)
                    <li>
                        <a href="{{$v['url_1']}}">
                        <img src="{{$v['pic_1']}}" width="740" height="401" />
                        </a>
                    </li>
                    <li>
                        <a href="{{$v['url_2']}}">
                        <img src="{{$v['pic_2']}}" width="740" height="401" />
                        </a>
                    </li> 
                    <li>
                        <a href="{{$v['url_3']}}">
                        <img src="{{$v['pic_3']}}" width="740" height="401" />
                        </a>
                    </li> 
                    @endforeach
                </ul>	
                <div class="op_btns clearfix">
                    <a href="#" class="op_btn op_prev"><span></span></a>
                    <a href="#" class="op_btn op_next"><span></span></a>
                </div>        
            </div>
        </div>
        <script type="text/javascript">
        //var jq = jQuery.noConflict();
        (function(){
            $(".bxslider").bxSlider({
                auto:true,
                prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
            });
        })();
        </script>
        <!--End Banner End-->
        <div class="inews">
        	<div class="news_t">
            	<span class="fr"><a href="#">更多 ></a></span>新闻资讯
            </div>
            <ul>
                @foreach($news as $k=>$v)
            	<li><span>[ 公告 ]</span><a href="/home/news/detail?id={{$v['id']}}">{{$v['title']}}</a></li>
                @endforeach
            </ul>

        </div>
    </div>
    <!--End 母婴玩具 End-->
    <!--Begin 家居生活 Begin-->
    <div class="i_t mar_10">
    	
    	<span class="fl">家居生活</span>                                
        <span class="i_mores fr"><a href="#">床上用品</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">家纺布艺</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">餐具</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">沙发</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">汽车用品</a></span>                                              
    </div>
    <div class="content">
    	<div class="home_left">
        	<div class="home_ban">
            	<div id="imgPlay5">
                    <ul class="imgs" id="actor5">
                        <li><a href="#"><img src="home/images/home_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="home/images/home_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="home/images/home_r.jpg" width="211" height="286" /></a></li>
                    </ul>
                    <div class="prev_h">上一张</div>
                    <div class="next_h">下一张</div> 
                </div>   
            </div>
            <div class="fresh_txt">
            	<div class="fresh_txt_c">
                	<a href="#">床上用品</a><a href="#">家纺布艺</a><a href="#">餐具水具</a><a href="#">锅具厨具</a><a href="#">沙发</a><a href="#">书柜</a><a href="#">狗粮</a><a href="#">家装建材</a><a href="#">汽车用品</a>
                </div>
            </div>
        </div>
        <div class="fresh_mid">
        	<ul>
            	<li>
                	<div class="name"><a href="#">品质蓝色沙发</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 50R
                    </div>
                    <div class="img"><a href="#"><img src="home/images/home_1.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">品质蓝色沙发</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 50R
                    </div>
                    <div class="img"><a href="#"><img src="home/images/home_2.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">品质蓝色沙发</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 50R
                    </div>
                    <div class="img"><a href="#"><img src="home/images/home_3.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">品质蓝色沙发</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 50R
                    </div>
                    <div class="img"><a href="#"><img src="home/images/home_4.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">品质蓝色沙发</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 50R
                    </div>
                    <div class="img"><a href="#"><img src="home/images/home_5.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">品质蓝色沙发</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 50R
                    </div>
                    <div class="img"><a href="#"><img src="home/images/home_6.jpg" width="185" height="155" /></a></div>
                </li>
            </ul>
        </div>
        <div class="fresh_right">
        	<ul>
            	<li><a href="#"><img src="home/images/home_b1.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="home/images/home_b2.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    <!--End 家居生活 End-->
    <!--Begin 数码家电 Begin-->
    <div class="i_t mar_10">
    	
    	<span class="fl">数码家电</span>                                
        <span class="i_mores fr"><a href="#">手机</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">苹果</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">华为手机</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">洗衣机</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">数码配件</a></span>                                               
    </div>
    <div class="content">
    	<div class="tel_left">
        	<div class="tel_ban">
            	<div id="imgPlay6">
                    <ul class="imgs" id="actor6">
                        <li><a href="#"><img src="home/images/tel_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="home/images/tel_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="home/images/tel_r.jpg" width="211" height="286" /></a></li>
                    </ul>
                    <div class="prev_t">上一张</div>
                    <div class="next_t">下一张</div> 
                </div>   
            </div>
            <div class="fresh_txt">
            	<div class="fresh_txt_c">
                	<a href="#">手机</a><a href="#">平板电脑</a><a href="#">空调</a><a href="#">合约机</a><a href="#">电风扇</a><a href="#">数码配件</a><a href="#">洗衣机</a><a href="#">电视</a><a href="#">充电器</a><a href="#">耳线</a>
                </div>
            </div>
        </div>
        <div class="fresh_mid">
        	<ul>
            	<li>
                	<div class="name"><a href="#">乐视高清电视</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="home/images/tel_1.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">乐视高清电视</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="home/images/tel_2.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">乐视高清电视</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="home/images/tel_3.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">乐视高清电视</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="home/images/tel_4.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">乐视高清电视</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="home/images/tel_5.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">乐视高清电视</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="home/images/tel_6.jpg" width="185" height="155" /></a></div>
                </li>
            </ul>
        </div>
        <div class="fresh_right">
        	<ul>
            	<li><a href="#"><img src="home/images/tel_b1.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="home/images/tel_b2.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    <!--End 猜你喜欢 End-->
    
    <!--Begin Footer Begin -->
    
   
    <!--End Footer End -->    
</div>
@endsection



