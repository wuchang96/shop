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
                        {{$data['title']}}
                    </div>
                </div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">新闻插图</label>
    				<div class="mws-form-item">
    					<img src="{{URL::asset($data['apic'])}}" style="width: 200px;height: 200px;">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">新闻内容</label>
    				<div class="mws-form-item clearfix" style="width: 200px;height:100%; border:1px solid #orange;">
                        {{$data['content']}}
    				</div>
    			</div>

                <div class="mws-form-row">
                    <label class="mws-form-label">新闻作者</label>
                    <div class="mws-form-item clearfix">
                        {{$data['author']}} 
                    </div>
                </div>

    		</div>
    		<div class="mws-button-row">

    			{{csrf_field()}}
    			<a type="submit" class="btn btn-info" href="/admin/news">返回</a>
    		</div>
    	</form>
    </div>    	
</div>

<!-- 右侧内容框架，更改从这里结束 -->
@endsection