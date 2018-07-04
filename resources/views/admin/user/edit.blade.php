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


    	<form action="/admin/user/{{$res->id}}" method='post' class="mws-form" enctype='multipart/form-data'>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='uname' value='{{$res->uname}}'>
    				</div>
    			</div>

    			<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">昵称</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='nickname' value='{{$res->nickname}}'>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">邮箱</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='email' value='{{$res->email}}'>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">手机号</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='tel' value='{{$res->tel}}'>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">年龄</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='age' value='{{$res->age}}'>
    				</div>
    			</div>
				
				<div class="mws-form-row">
    				<label class="mws-form-label">性别</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">

    						<li><input type="radio" name='sex' value='0' @if($res->sex == '0') checked='checked' @endif> <label>男</label></li>

    						<li><input type="radio" name='sex' value='1'  @if($res->sex == '1') checked='checked' @endif> <label>女</label></li>

    						<li><input type="radio" name='sex' value='1'  @if($res->sex == '2') checked='checked' @endif> <label>保密</label></li>

    					</ul>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">头像</label>
    				<div class="mws-form-item">

                        <img src="{{$res->header}}" alt="" width='200'>

    					<input type="file" name='header' class="fileinput-preview" style="width: 100%; padding-right: 84px;" readonly="readonly" placeholder="No file selected...">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">状态</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">

    						<li><input type="radio" name='auth' value='0' @if($res->auth == '0') checked='checked' @endif> <label>启动</label></li>


    						<li><input type="radio" name='auth' value='1'  @if($res->auth == '1') checked='checked' @endif> <label>禁止</label></li>

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

@endsection

@section('js')


@endsection