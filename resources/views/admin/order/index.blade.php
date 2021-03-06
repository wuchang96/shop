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
         <div class="mws-firm-message info">
         </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

			<form action="/admin/order" method='get'>
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>
                        显示
                        <select name="num" size="1" aria-controls="DataTables_Table_1">
                            <option value="5" @if($request->num == 5)   selected="selected" @endif>
                                5
                            </option>
                            <option value="10" @if($request->num == 10)   selected="selected" @endif>
                                10
                            </option>
                            <option value="15" @if($request->num == 15)   selected="selected" @endif>
                                15
                            </option>                            
                        </select>
                        条数据
                    </label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>
                        订单号:
                        <input type="text" name='oid' value="{{$request->oid}}" aria-controls="DataTables_Table_1">
                    </label>

                    <label>
                        姓名:
                        <input type="text" name='name' value="{{$request->name}}" aria-controls="DataTables_Table_1">
                    </label>

                    <button class='btn btn-info'>搜索</button>
                </div>
            </form>





            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            订单号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 50px;" aria-label="Browser: activate to sort column ascending">
                            收货人
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="Platform(s): activate to sort column ascending">
                            收货地址
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-label="Engine version: activate to sort column ascending">
                            手机号
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 50px;" aria-label="CSS grade: activate to sort column ascending">
                           总金额
                        </th>
                        <!--  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                                                rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                          买家留言
                                                </th> -->
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 50px;" aria-label="CSS grade: activate to sort column ascending">
                           状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                   @foreach ($order as $k => $v)
                    <tr class="@if($k % 2 == 1)  odd   @else even  @endif">
                        
                        <td class=" ">
                            {{$v->oid}}
                        </td>
                        <td class=" ">
                             {{$v->name}}
                        </td>
                        <td class=" ">
                             {{$v->addr}}
                        </td>
                         </td>
                        <td class=" ">
                             {{$v->tel}}
                        </td>
                         </td>
                        <td class=" ">
                             {{$v->sum}}
                        </td>
                        <!-- <td class=" ">
                             {{$v->umsg}}
                        </td> -->
                         <td class=" ">
                             @if ($v->status == 0)
                                    新订单
                             @elseif($v->status == 1)
                                    发货
                             @elseif($v->status == 2)
                                    已发货
                             @elseif($v->status == 3)
                                    交易完成
                             @elseif($v->status == 4)
                                    无效订单
                             @endif
                            
                        </td>
                         <td class=" ">
                            <button class="btn btn-info"><a href="/admin/details/{{$v->oid}}">详情</a></button>

                            <button class="btn btn-warning"><a href="/admin/order/{{$v->oid}}/edit">修改</a></button>
                            
                            @if($v->status == 0)
                            <button class="btn btn-success"><a href="/admin/fa/{{$v->oid}}">发货</a></button>
                            @elseif($v->status == 2)
                            <button class="btn btn-gray"><a href="#">等待签收</a></button>
                            @endif
                            <form action="/admin/order/{{$v->oid}}" method='post' style='display:inline'>
                                
                                {{csrf_field()}}

                                {{method_field('DELETE')}}
                                <button href="/admin/order/{{$v->oid}}" class='btn btn-danger'>删除</button>

                            </form>
                        </td>
                    </tr>
                 @endforeach
               
                </tbody>
            </table>

            <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to 10 of 57 entries
            </div>

			<style>
                .pagination li{
                    float: left;
                    height: 20px;
                    padding: 0 10px;
                    display: block;
                    font-size: 12px;
                    line-height: 20px;
                    text-align: center;
                    cursor: pointer;
                    outline: none;
                    background-color: #444444;


                  
                    text-decoration: none;
                    border-right: 1px solid #232323;
                    border-left: 1px solid #666666;
                    border-right: 1px solid rgba(0, 0, 0, 0.5);
                    border-left: 1px solid rgba(255, 255, 255, 0.15);
                    -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                }

                .pagination li a{
                      color: #fff;
                }


                .pagination .active{
                    background-color: #88a9eb;
                    color: #323232;
                    border: none;
                    background-image: none;
                    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                }

                .pagination .disabled{
                        color: #666666;
                        cursor: default;
                }

                #paginate ul{
                    
                    margin:0px;
                }
            </style>


            <div class="dataTables_paginate paging_full_numbers" id="paginate">

                 {{ $order->appends($request->all())->links() }}

            </div>
        </div>
    </div>
</div>
 

@endsection