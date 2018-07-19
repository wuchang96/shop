@extends('layout.home')

@section('content')
<script type="text/javascript" src="/home/js/n_nav.js"></script>
    <div class="i_bg">
    <div class="content mar_20">
        <div class="l_history">
            <div class="his_t">
                <span class="fl">浏览历史</span>
                <span class="fr"><a href="#">清空</a></span>
            </div>
            <!-- 浏览历史区域开始 -->
            <ul>
                <li>
                    <div class="img"><a href="#"><img src="images/his_1.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="images/his_2.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>768.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="images/his_3.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>680.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="images/his_4.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="images/his_5.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
            </ul>
            <!-- 浏览历史区域结束 -->
        </div>
        <div class="l_list">
            <!-- 显示商品分类 -->
            <!-- 搜索条件 -->
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
                <span class="fr">共发现: <span class="count">{{$count}}</span>件</span>
            </div>
            <!-- end -->
            <div class="list_c">
                
                <ul class="cate_list">
                    @foreach ($data as $gv)
                    <li style="height: 500px;margin-right:50px;margin-left: 25px;border: 1px solid white" class="higood">
                        <div class="img" style="width:240px;height: 360px;" id="pic"><a href="/home/goods/{{$gv->id}}"></a></div>
                        <div class="price">
                            <font>￥<span>{{$gv->price}}</span></font> &nbsp; 
                        </div>
                        <div class="name"><a href="/home/goods/{{$gv->id}}" title="{{$gv->gname}}">{{$gv->gname}}</a></div>
                       
                        <div class="carbg">
                            <a href="#" class="ss">收藏</a>
                            <a href="/home/goods/{{$gv->id}}" class="j_car">加入购物车</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                
                <div class="pages">
                    
                </div>
                
                
                
            </div>
        </div>
    </div>

@endsection