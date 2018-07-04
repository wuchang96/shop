@extends('layout.admin')

@section('title',$title)

@section('content')
<div class="mws-panel grid_8">
    <<div class="mws-panel-header">
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
        <form action="#" method='post' class="mws-form" enctype='multipart/form-data'>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">订单号</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='username' value='' readonly="readonly">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">收货人</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='email' value=''>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">收货地址</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='phone' value=''>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">手机号</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='phone' value=''>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">总金额</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='phone' value=''>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">买家留言</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='phone' value=''>
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
