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

        <form class="mws-form"  action="/admin/news/{{$data->id}}" method="post" enctype='multipart/form-data'>

        <div class="mws-form-inline">
            <div class="mws-form-row">
                <label  class="mws-form-label">
                   新闻标题:
                </label>
                <div class="mws-form-item">
                    <input type="text" name="title" class="layui-input" value="{{$data->title}}">
                </div>
            </div>

            <div class="mws-form-row">
                <label  class="mws-form-label">
                   修改插图:
                </label>
                <div class="mws-form-item">
                    <img src="{{URL::asset($data['apic'])}}" style="width: 150px;height: 150px;">
                    <input type="file"  name="apic" value="" class="layui-btn">
                </div>                
            </div>

            <div class="mws-form-row">
                <label  class="mws-form-label">
                   新闻内容:
                </label>
                <div class="mws-form-item">
                    <textarea name="content" id="" cols="70" rows="10" style="overflow: scroll;background: #999;" >{{$data->content}}</textarea>                
                </div>
            </div>     

        </div>
            <div class="mws-button-row">

                {{csrf_field()}}

                {{method_field('PUT')}}
                <input type="submit" class="btn btn-success" value="确认修改">
            </div>

        </form>
    </div>      
</div>


<!-- 右侧内容框架，更改从这里结束 -->
@endsection