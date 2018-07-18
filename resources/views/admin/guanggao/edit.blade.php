@extends('layout.admin')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
        @if (count($errors) > 0)
            <div class="mws-form-message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style='font-size:16px;list-style:none'>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mws-form"  action="/admin/guanggao/{{$data->id}}" method="post" enctype='multipart/form-data'>

        <div class="mws-form-inline">
            <div class="mws-form-row">
                <label  class="mws-form-label">
                   广告类别:
                </label>
                <div class="mws-form-item">
                    <select name="cid" lay-filter="aihao">
                    <option value="0" @if($data->cate==0) selected @endif>----请选择----</option>
                    <option value="1" @if($data->cate==1) selected @endif>商品推广</option>
                    <option value="2" @if($data->cate==2) selected @endif>公益广告</option>
                  </select>
                </div>
            </div>

            <div class="mws-form-row">
                <label  class="mws-form-label">顾客信息:</label>
                <div class="mws-form-item">
                    <input type="text" name="acustomer" autocomplete="off" value="{{$data->acustomer}}" class="layui-input">
                </div>
            </div>

            <div class="mws-form-row">
                <label  class="mws-form-label">
                   标题:
                </label>
                <div class="mws-form-item">
                    <input type="text" name="atitle" lay-verify="required" value="{{$data->atitle}}" autocomplete="off" class="layui-input">                
                </div>
            </div>

            <div class="mws-form-row">
                <label  class="mws-form-label">
                   修改图片:
                </label>
                <div class="mws-form-item">
                    <img src="{{URL::asset($data['pic'])}}" style="width: 150px;height: 150px;">
                    <input type="file"  name="pic" value="" class="layui-btn">
                </div>                
            </div>

            <div class="mws-form-row">
                <label  class="mws-form-label">
                   修改跳转地址:
                </label>
                <div class="mws-form-item">
                    <input type="text" name="url" lay-verify="required" value="{{$data->url}}" autocomplete="off" class="layui-input">
                </div>
            </div>     

            <div class="mws-form-row">
                    <label class="mws-form-label">修改下架时间:</label>
                    <div class="mws-form-item clearfix">
                        <input type="date" name="date_max" placeholder="" autocomplete="off" class="layui-input">
                    </div>
            </div>

            <div class="mws-form-row">
                <label  class="mws-form-label">
                   修改价格:
                </label>
                <div class="mws-form-item">
                    <input type="text" name="aprice" lay-verify="required" value="{{$data->aprice}}" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="mws-form-row">
                <label class="mws-form-label">状态</label>
                <div class="mws-form-item clearfix">
                    <ul class="mws-form-list inline">
                        <li><input type="radio" name='astatus' value='1' checked='checked'> <label>上架</label></li>
                        <li><input type="radio" name='astatus' value='0'> <label>下架</label></li>
                    </ul>
                </div>
            </div>

        </div>
            <div class="mws-button-row">

                {{csrf_field()}}

                {{method_field('PUT')}}
                <input type="submit" class="btn btn-success" value="修改">
            </div>

        </form>
    </div>      
</div>


<!-- 右侧内容框架，更改从这里结束 -->
@endsection