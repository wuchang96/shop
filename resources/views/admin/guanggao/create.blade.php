@extends('layout.admin')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">

    	<form action="/admin/guanggao" method='post' class="mws-form" enctype='multipart/form-data'>
    		<div class="mws-form-inline">

    			<div class="mws-form-row">
    				<label class="mws-form-label">广告类别</label>
    				<div class="mws-form-item">
    					<select name="cate" lay-filter="aihao">
				        <option value="0">----请选择----</option>
				        <option value="1">商品推广</option>
				        <option value="2">公益广告</option>
				      </select>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">顾客信息:</label>
    				<div class="mws-form-item">
    					<input type="text" name="acustomer" placeholder="请输入顾客信息" class="layui-input">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">标题:</label>
    				<div class="mws-form-item">
    					<input type="text" name="atitle" lay-verify="required" placeholder="请输入标题说明" autocomplete="off" class="layui-input">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">上传图片</label>
    				<div class="mws-form-item">
    					<input type="file" name="pic" class="layui-input">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">跳转地址</label>
    				<div class="mws-form-item clearfix">
                        <input type="text" name="url" class="layui-input">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">上架时间:</label>
    				<div class="mws-form-item clearfix">
                        <input type="date" name="date_min" placeholder="" autocomplete="off" class="layui-input">
                        <input type="date" name="date_max" placeholder="" autocomplete="off" class="layui-input">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">价格:</label>
    				<div class="mws-form-item clearfix">
                        <input type="text" name="aprice" lay-verify="required" placeholder="￥" autocomplete="off" class="layui-input">
    				</div>
    			</div>

    		</div>
    		{{csrf_field()}}
    		<div class="mws-button-row">
    			<input type="submit" class="btn btn-success" value="提交">
    		</div>
    	</form>
    </div>    	
</div>


<!-- 右侧内容框架，更改从这里结束 -->
@endsection