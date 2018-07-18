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


    	<form action="/admin/news" method='post' class="mws-form" enctype='multipart/form-data'>
    		<div class="mws-form-inline">

                <div class="mws-form-row">
                    <label class="mws-form-label">新闻标题</label>
                    <div class="mws-form-item clearfix">
                        <input type="text"  name="title" class="layui-input">
                    </div>
                </div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">新闻插图</label>
    				<div class="mws-form-item">
    					<input type="file" name='apic' class="fileinput-preview">
    				</div>
    			</div>

                <div class="mws-form-row">
                    <label class="mws-form-label">新闻跳转</label>
                    <div class="mws-form-item clearfix">
                        <input id="myform" type="text"  name="aurl" class="layui-input">
                    </div>
                </div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">新闻内容</label>
    				<div class="mws-form-item clearfix">
                        <textarea name="content" id="" cols="70" rows="10" style="overflow: scroll;background: #999;"></textarea>
    				</div>
    			</div>

                <div class="mws-form-row">
                    <label class="mws-form-label">新闻作者</label>
                    <div class="mws-form-item clearfix">
                        <input type="text"  name="author" class="layui-input">
                    </div>
                </div>

    		</div>
    		<div class="mws-button-row">

    			{{csrf_field()}}
    			<input type="submit" class="btn btn-info" value="提交">
    		</div>
    	</form>
    </div>    	
</div>

<!-- 右侧内容框架，更改从这里结束 -->
@endsection