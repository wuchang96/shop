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


    	<form action="/admin/user" method='post' class="mws-form" enctype='multipart/form-data'>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='uname'>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">昵称</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='nickname'>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">密码</label>
    				<div class="mws-form-item">
    					<input type="password" class="small" name='password'>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">确认密码</label>
    				<div class="mws-form-item">
    					<input type="password" class="small" name='repass'>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">年龄</label>
    				<div class="mws-form-item">
    					<input type="password" class="small" name='age'>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">性别</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">
    						<li><input type="radio" name='sex' value='0' checked='checked'> <label>男</label></li>
    						<li><input type="radio" name='sex' value='1'> <label>女</label></li>
    						<li><input type="radio" name='sex' value='2'> <label>保密</label></li>
    					</ul>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">手机号</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='tel'>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">头像</label>
    				<div class="mws-form-item">
    					<input type="file" name='header' class="fileinput-preview" readonly="readonly" placeholder="请上传头像">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">状态</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">
    						<li><input type="radio" name='status' value='1' checked='checked'> <label>启动</label></li>
    						<li><input type="radio" name='status' value='0'> <label>禁止</label></li>
    					</ul>
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

@endsection

@section('js')
	<script>
		
		$('.mws-form-message').fadeOut(5000);
	</script>

@endsection