@extends('layout.admin')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="layui-form layui-form-pane"  action="/admin/guanggao/{{$data->id}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        </form>
        <input type="hidden" value="{{$data->date_min}}" id="date_min">
        <input type="hidden" value="{{$data->date_max}}" id="date_max">
    </div>      
</div>

<!-- 右侧内容框架，更改从这里结束 -->
@endsection