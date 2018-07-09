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

        <form class="mws-form" method="post" action="/admin/link/{{$data['id']}}" enctype="multipart/form-data">

        <div class="mws--inline">

            <div class="mws-form-row">
                <label class="mws-form-label">
                    友情连接名称:
                </label>
                <div class="mws-form-item">
                    <input type="text" name='name' value="{{$data['name']}}" class="fileinput-preview">
                </div>
            </div>

            <div class="mws-form-row">
                <label  class="mws-form-label">
                   友情链接图片:
                </label>
                <div class="mws-form-item">
                    <img src="{{URL::asset($data['img'])}}" style="width: 150px;height: 150px;">
                    <input type="file"  name="img" value="" class="layui-input">
                </div>
            </div>

            <div class="mws-form-row">
                <label  class="mws-form-label">
                   跳转地址:
                </label>
                <div class="mws-form-item">
                    <input type="text"  name="url" value="{{$data['url']}}" class="layui-input">
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