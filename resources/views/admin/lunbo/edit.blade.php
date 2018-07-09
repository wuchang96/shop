@extends('layout.admin')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">

       <form class="layui-form" method="post" action="/admin/lunbo/{{$data['id']}}" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
            <div class="layui-form-item">
            <ul>

                <label  class="layui-form-label">
                   轮播图
                </label>
                <div class="layui-input-inline">
                    <img src="{{URL::asset($data['pic'])}}" style="width: 150px;height: 150px;">
                    <input type="file"  name="pic" value="" class="layui-input">
                </div>
            </ul>
            </div> 

            <ul>
            <div class="layui-form-item">
                <label  class="layui-form-label">
                   跳转地址
                </label>
                <div class="layui-input-inline">
                    <input type="text"  name="url" value="{{$data['url']}}" class="layui-input">
                </div>
            </div>
            </ul>

            <div class="layui-input-inline">
                    <input type="submit" value="确认修改" class="btn btn-info" style="margin-left: 80px;">
            </div>
        </form>
    </div>    	
</div>

<!-- 右侧内容框架，更改从这里结束 -->
@endsection