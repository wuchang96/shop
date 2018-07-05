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
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
			
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">
                            站点名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="Browser: activate to sort column ascending">
                            站点描述
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="Platform(s): activate to sort column ascending">
                            联系方式
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="Engine version: activate to sort column ascending">
                            网址
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           Logo
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 140px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($res as $k => $v)
                    <tr class="even">
                        <td class=" ">
                            {{$v->id}}
                        </td>
                        <td class=" ">
                            {{$v->name}}
                        </td>
                        <td class=" ">
                            {{$v->descr}}
                        </td>
                        <td class=" ">
                           {{$v->tel}}     
                        </td>
                        <td class=" ">
                            {{$v->daddr}}
                            
                        </td>
                        <td class=" ">
                            <img src="{{$v->logo}}" alt="">
                        </td>
                        <td class=" ">
                            @if($v->dstatis == 1)
                                正常运行
                            @else
                                维护
                            @endif                          
                        </td>
                        <td class=" ">
                            <a href="/admin/detail/{{$v->id}}" class='btn btn-info'>详情</a>

                            <a href="/admin/site/{{$v->id}}/edit" class='btn btn-info'>修改</a>
                            
                        </td>
                    </tr>
               @endforeach
                </tbody>
            </table>

            <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to 10 of 57 entries
            </div>
        </div>
    </div>
</div>

@endsection