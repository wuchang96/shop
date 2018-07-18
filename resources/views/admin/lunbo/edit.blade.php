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

        <form class="mws-form" method="post" action="/admin/lunbo/{{$data['id']}}" enctype="multipart/form-data">

        <div class="mws-form-inline">

            <div class="mws-form-row">
                <label  class="mws-form-label">
                   轮播图①:
                </label>
                <div class="mws-form-item">
                    <img src="{{URL::asset($data['pic_1'])}}" style="width: 150px;height: 150px;">
                    <input type="file"  name="pic_1" value="" class="layui-input">
                </div>
            </div>
            <div class="mws-form-row">
                <label  class="mws-form-label">
                   跳转地址①:
                </label>
                <div class="mws-form-item">
                    <input type="text"  name="url_1" value="{{$data['url_1']}}" class="layui-input">
                </div>
            </div>


            <div class="mws-form-row">
                <label  class="mws-form-label">
                   轮播图②:
                </label>
                <div class="mws-form-item">
                    <img src="{{URL::asset($data['pic_2'])}}" style="width: 150px;height: 150px;">
                    <input type="file"  name="pic_2" value="{{$data['pic_2']}}" class="layui-input">
                </div>
            </div>
            <div class="mws-form-row">
                <label  class="mws-form-label">
                   跳转地址②:
                </label>
                <div class="mws-form-item">
                    <input type="text"  name="url_2" value="{{$data['url_2']}}" class="layui-input">
                </div>
            </div>


            <div class="mws-form-row">
                <label  class="mws-form-label">
                   轮播图③:
                </label>
                <div class="mws-form-item">
                    <img src="{{URL::asset($data['pic_3'])}}" style="width: 150px;height: 150px;">
                    <input type="file"  name="pic_3" value="" class="layui-input">
                </div>
            </div>
            <div class="mws-form-row">
                <label  class="mws-form-label">
                   跳转地址③:
                </label>
                <div class="mws-form-item">
                    <input type="text"  name="url_3" value="{{$data['url_3']}}" class="layui-input">
                </div>
            </div>

        </div>
            <div class="mws-button-row">

                {{csrf_field()}}

                {{method_field('PUT')}}
                <input type="submit" class="btn btn-info" value="确认修改">
            </div>
        </form>
    </div>    	
</div>

<!-- 右侧内容框架，更改从这里结束 -->
@endsection