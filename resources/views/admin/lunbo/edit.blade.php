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


    	<form action="/admin/lunbo" method='post' class="mws-form" enctype='multipart/form-data'>
    		<div class="mws-form-inline">


    			<div class="mws-form-row">
    				<label class="mws-form-label">轮播图</label>
    				<div class="mws-form-item">
    					<input type="file" name='pic' class="fileinput-preview">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">跳转地址</label>
    				<div class="mws-form-item clearfix">
                        <input id="myform" type="text"  name="url" class="layui-input">
    				</div>
    			</div>
    		</div>
    		<div class="layui-input-inline">
                        <input type="submit" value="确认修改" class="layui-btn layui-btn-normal layui-btn-radius" style="margin-left: 110px;">
            </div>
    	</form>
    </div>    	
</div>

<!-- 右侧内容框架，更改从这里结束 -->
@endsection