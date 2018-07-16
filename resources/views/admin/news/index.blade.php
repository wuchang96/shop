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

            <form action="/admin/news" method='get'>
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>
                        显示
                    <select name="page_count" size="1" aria-controls="DataTables_Table_1">
                     <option value="3"
                         @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 3)
                         selected 
                         @endif >3条</option>
                     <option value="5"
                       @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 5)
                           selected 
                           @endif >5条</option>
                       <option value="8"
                       @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 8)
                           selected 
                           @endif >8条</option>
                       <option value="11"
                       @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 11)
                           selected 
                         @endif >11条</option>
                   </select>
                        条数据
                    </label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label class="layui-form-label xbs768">作者:　</label>
                    <input type="text" class="layui-input" placeholder="请输入作者姓名" value="{{$search['search'] or ''}}" name="search" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

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
                        rowspan="1" colspan="1" style="width: 150px;" aria-label="Browser: activate to sort column ascending">
                           新闻标题
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
                            新闻作者
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 150px;" aria-label="Engine version: activate to sort column ascending">
                            新闻插图
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 150px;" aria-label="Engine version: activate to sort column ascending">
                            创建时间
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
                        <td>
                            {{$v->id}}
                        </td>
                        <td >
                            {{$v->title}}
                        </td>
                        <td >
                            {{$v->author}}
                        </td>
                        <td >
                            <img src="{{URL::asset($v->apic)}}" alt="" width="100px">
                        </td>
                        
                        <td>{{$v->created_at}}</td>

                        <td class=" ">
                          <a href="/admin/news/{{$v->id}}/edit" class='btn btn-info'>修改</a>

                          <form action="/admin/news/{{$v->id}}" method='post' style='display:inline'>
                              
                              {{csrf_field()}}

                              {{method_field('DELETE')}}
                              <button href="" class='btn btn-warning' style='margin:15px'>删除</button>
                          </form>
                          <a class="btn btn-success" href="/admin/news/{{$v->id}}">文章详情</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
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