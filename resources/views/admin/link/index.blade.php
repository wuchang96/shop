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

          <form action="/admin/link" method='get'>
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>
                        显示
                        <select name="page_count" size="1" aria-controls="DataTables_Table_1">

                            <option value="4" @if($request->page_count == 4)   selected="selected" @endif>
                                4
                            </option>
                            <option value="8" @if($request->page_count == 8)   selected="selected" @endif>
                                8
                            </option>
                            <option value="12" @if($request->page_count == 12)   selected="selected" @endif>
                                12
                            </option>
                           
                            
                        </select>
                        条数据
                    </label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label class="layui-form-label xbs768">链接名:　</label>
                    <input type="text" class="layui-input" placeholder="请输入友情链接名称" value="{{$search['search'] or ''}}" name="search" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class='btn btn-info'>搜索</button>
                </div>
            </form>

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 50px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-label="Engine version: activate to sort column ascending">
                            友情链接名称
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">
                           友情链接图片
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-label="Engine version: activate to sort column ascending">
                            跳转路径
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-label="Engine version: activate to sort column ascending">
                            创建时间
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-label="Engine version: activate to sort column ascending">
                            修改时间
                        </th>
                        
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 60px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

          @foreach($data as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->name}}</td>
                <td><img src="{{$v->img}}" style="width: 150px;height: 150px;"></td>
                <td><a>{{$v->url}}</a></td>
                <td>{{$v->created_at}}</td>
                <td>{{$v->updated_at}}</td>
                  <td class=" ">
                      <a href="/admin/link/{{$v->id}}/edit" class='btn btn-info'>修改</a>

                      <form action="/admin/link/{{$v->id}}" method='post' style='display:inline'>
                          
                          {{csrf_field()}}

                          {{method_field('DELETE')}}
                          <button href="" class='btn btn-warning'>删除</button>

                      </form>
                            
                  </td>
              </tr>

          </tbody>
          @endforeach
               
                </tbody>
            </table>   
        </div>
    </div>
</div>
    
<!-- 右侧内容框架，更改从这里结束 -->
@endsection


