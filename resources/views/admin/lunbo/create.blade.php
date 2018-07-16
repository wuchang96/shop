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
    				<label class="mws-form-label">轮播图①</label>
    				<div class="mws-form-item">
    					<input type="file" name='pic_1' class="fileinput-preview">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">跳转地址①</label>
    				<div class="mws-form-item clearfix">
                        <input id="myform" type="text"  name="url_1" class="layui-input">
    				</div>
    			</div>

                <div class="mws-form-row">
                    <label class="mws-form-label">轮播图②</label>
                    <div class="mws-form-item">
                        <input type="file" name='pic_2' class="fileinput-preview">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">跳转地址②</label>
                    <div class="mws-form-item clearfix">
                        <input id="myform" type="text"  name="url_2" class="layui-input">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">轮播图③</label>
                    <div class="mws-form-item">
                        <input type="file" name='pic_3' class="fileinput-preview">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">跳转地址③</label>
                    <div class="mws-form-item clearfix">
                        <input id="myform" type="text"  name="url_3" class="layui-input">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">轮播图④</label>
                    <div class="mws-form-item">
                        <input type="file" name='pic_4' class="fileinput-preview">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">跳转地址④</label>
                    <div class="mws-form-item clearfix">
                        <input id="myform" type="text"  name="url_4" class="layui-input">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">轮播图⑤</label>
                    <div class="mws-form-item">
                        <input type="file" name='pic_5' class="fileinput-preview">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">跳转地址⑤</label>
                    <div class="mws-form-item clearfix">
                        <input id="myform" type="text"  name="url_5" class="layui-input">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">轮播图⑥</label>
                    <div class="mws-form-item">
                        <input type="file" name='pic_6' class="fileinput-preview">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">跳转地址⑥</label>
                    <div class="mws-form-item clearfix">
                        <input id="myform" type="text"  name="url_6" class="layui-input">
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