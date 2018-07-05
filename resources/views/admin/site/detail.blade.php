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


        <form action="/admin/site/{{$res->id}}" method='post' class="mws-form" enctype='multipart/form-data'>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">站点名称</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='name' value='{{$res->name}}' readonly="readonly">
                    </div>
                </div>

                <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">站点描述</label>
                    <div class="mws-form-item">
                        <input type="text"  class="small" name='descr' value='{{$res->descr}}' readonly="readonly">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">联系方式</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='tel' value='{{$res->tel}}' readonly="readonly">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">站点备案号</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='dnum' value='{{$res->dnum}}' readonly="readonly">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">版本信息</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='detial' value='{{$res->detial}}' readonly="readonly">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">网址</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='daddr' value='{{$res->daddr}}' readonly="readonly">
                    </div>
                </div>
                
                <div class="mws-form-row">
                    <label class="mws-form-label">站点Logo</label>
                    <div class="mws-form-item">

                        <img src="{{$res->logo}}" alt="" width='200'>

                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">站点状态</label>
                    <div class="mws-form-item clearfix">
                        @if($res->dstatis == 1)
                            正常运行
                        @else
                            维护
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>      
</div>

@endsection