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
                        <input type="text" class="small" name='name' value='{{$res->name}}'>
                    </div>
                </div>

                <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">站点描述</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='descr' value='{{$res->descr}}'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">联系方式</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='tel' value='{{$res->tel}}'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">站点备案号</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='dnum' value='{{$res->dnum}}'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">版本信息</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='detial' value='{{$res->detial}}'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">网址</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='daddr' value='{{$res->daddr}}'>
                    </div>
                </div>
                
                <div class="mws-form-row">
                    <label class="mws-form-label">站点Logo</label>
                    <div class="mws-form-item">

                        <img src="{{$res->logo}}" alt="" width='200'>

                        <input type="file" name='logo' class="fileinput-preview" style="width: 100%; padding-right: 84px;" readonly="readonly" placeholder="No file selected...">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">站点状态</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">

                            <li><input type="radio" name='dstatis' value='0' @if($res->dstatis == '0') checked='checked' @endif> <label>维护</label></li>


                            <li><input type="radio" name='dstatis' value='1'  @if($res->dstatis == '1') checked='checked' @endif> <label>正常运行</label></li>

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