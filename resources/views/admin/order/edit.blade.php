@extends('layout.admin')

@section('title',$title)

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            {{$title}}
        </span>
    </div>
    <div class="mws-panel-body no-padding">

        <form action="/admin/order/update" method='post' class="mws-form" enctype='multipart/form-data'>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">订单号</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='id' value='{{$res->id}}' readonly="readonly">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">收货人</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='name' value='{{$res->name}}'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">收货地址</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='addr' value='{{$res->addr}}'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">手机号</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='tel' value='{{$res->tel}}'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">总金额</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='sum' value='{{$res->sum}}'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">买家留言</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='umsg' value='{{$res->umsg}}'>
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
