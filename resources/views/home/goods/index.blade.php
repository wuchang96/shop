@extends('layout.home')
@section('title',$title)
@section('content')
<script type="text/javascript" src="/home/js/n_nav.js"></script>
<div class="i_bg">
   
	<div class="postion">
    	<span class="fl">全部 > {{$prename}}> {{$aa}}  </span>
        
    </div>
    
    
    <div class="content mar_20">
    	<div class="l_history">
        	<div class="his_t">
            	<span class="fl">精品推荐</span>
                <span class="fr"><a href="#">清空</a></span>
            </div>
            <script>
                $('.fr').click(function(){
                    $('.l_history').hide();
                })
            </script>
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
        	<div class="list_t">
            	<span class="fl list_or">
                	<a href="#" class="now">默认</a>
                    <a href="#">
                    	<span class="fl">销量</span>                        
                        <span class="i_up">销量从低到高显示</span>
                        <span class="i_down">销量从高到低显示</span>                                                     
                    </a>
                    <a href="#">
                    	<span class="fl">价格</span>                        
                        <span class="i_up">价格从低到高显示</span>
                        <span class="i_down">价格从高到低显示</span>     
                    </a>
                    <a href="#">新品</a>
                </span>
                
            </div>
            <div class="list_c">
            	
                <ul class="cate_list">
                	@foreach($goods as $v)
                	<li>
                    	<div class="img"><a href="/home/goods/create?id={{$v->id}}"><img src="{{$v->gs[0]->gpic}}" width="210" height="185" /></a></div>
                        <div class="price">
                            <font>￥<span>{{$v->price}}</span></font> &nbsp; 26R
                        </div>
                        <div class="name"><a href="#">{{$v->gname}}</a></div>
                        <div class="carbg">
                        	<a href="/home/collect/{{$v->id}}" class="ss">收藏</a>
                            <a href="/home/cart/{{$v->id}}" class="j_car">加入购物车</a>
                        </div>
                    </li>
                   @endforeach
                </ul>
                
                
                
                
                
            </div>
        </div>
    </div>
    
    <!--Begin Footer Begin -->
    
    <!--End Footer End -->    
</div>



@endsection