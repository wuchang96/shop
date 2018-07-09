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


    	<form action="/admin/link" method='post' class="mws-form" enctype='multipart/form-data'>
    		<div class="mws-form-inline">


    			<div class="mws-form-row">
    				<label class="mws-form-label">友情连接名称</label>
    				<div class="mws-form-item">
    					<input type="text" name='name' class="fileinput-preview">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">友情连接图片</label>
    				<div class="mws-form-item clearfix">
                        <input type="file" name="img" class="layui-input">
    				</div>
    			</div>

                <div class="mws-form-row">
                    <label class="mws-form-label">友情连接地址</label>
                    <div class="mws-form-item">
                        <input type="text" name='url' class="layui-input">
                    </div>
                </div>
            </div>

    		<div class="mws-button-row">

    			{{csrf_field()}}
    			<input type="submit" class="btn btn-success" value="提交">
    		</div>
    	</form>
    </div>    	
</div>

<!-- 右侧内容框架，更改从这里结束 -->
@endsection