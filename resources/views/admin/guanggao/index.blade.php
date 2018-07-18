@extends('layout.admin')

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
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

            <form action="/admin/guanggao" method='get'>
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>
                        显示
                        <select name="page_count" size="1" aria-controls="DataTables_Table_1">

                            <option value="2" @if($request->page_count == 2)   selected="selected" @endif>
                                2
                            </option>
                            <option value="4" @if($request->page_count == 4)   selected="selected" @endif>
                                4
                            </option>
                            <option value="6" @if($request->page_count == 6)   selected="selected" @endif>
                                6
                            </option>
                           
                            
                        </select>
                        条数据
                    </label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label class="layui-form-label xbs768">顾客:　</label>
                    <input type="text" class="layui-input" placeholder="请输入顾客姓名" value="{{$search['search'] or ''}}" name="search" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <label class="layui-form-label"></font>广告分类:　</label>
                        <select name="cid" lay-filter="aihao">
                        <option value="0" @if($cid==0) selected @endif>----请选择----</option>
                        <option value="1" @if($cid==1) selected @endif>商品推广</option>
                        <option value="2" @if($cid==2) selected @endif>公益广告</option>
                        </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class='btn btn-info'>搜索</button>
                </div>
            </form>
            

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 130px;" aria-label="Browser: activate to sort column ascending">
                           广告类别
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
                            客户
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">
                            价格
                        </th>
                        
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 150px;" aria-label="CSS grade: activate to sort column ascending">
                           下架日期
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 140px;" aria-label="CSS grade: activate to sort column ascending">
                           广告图
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 140px;" aria-label="CSS grade: activate to sort column ascending">
                           广告跳转
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 140px;" aria-label="CSS grade: activate to sort column ascending">
                           广告状态
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 150px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $v)
                    <tr>
                        <td class="td">{{$v->id}}</td>
                        <td>
                            @if($v->cid==1)
                            商品推广
                            @elseif($v->cid==2)
                            公益广告
                            @endif
                        </td>
                        <td>
                            {{$v->acustomer}}
                        </td>
                        <td >
                            {{$v->aprice}}
                        </td>
                        <td >
                            {{date('Y-m-d',$v->date_max)}}
                        </td>
                        <td >
                            <img src="{{$v->pic}}" alt="" width="100px">
                        </td>
                        <td><a>{{$v['url']}}</a></td>
                        <td class="status" status="{{$v->astatus}}">
                            @if($v->astatus==1)上架
                            @elseif($v->astatus==0)下架
                            @endif
                        </td>
                       
                        <td class=" ">
                          <a href="/admin/guanggao/{{$v->id}}/edit" class='btn btn-info'>修改</a>

                          <form action="/admin/guanggao/{{$v->id}}" method='post' style='display:inline'>
                              
                              {{csrf_field()}}

                              {{method_field('DELETE')}}
                              <button href="" class='btn btn-warning'>删除</button>

                          </form>
                                
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to 10 of 57 entries
            </div>
        
            <div class="dataTables_paginate paging_full_numbers" id="paginate">


             {{ $data->links()}}
            </div>

        </div>
    </div>
</div>


@endsection