@extends('layout.admin')

<meta name="csrf-token" content="{{ csrf_token() }}">

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
        <form action="" method='get'>
                
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    

                    <button class='btn btn-info'>查看评论</button>
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
                        rowspan="1" colspan="1" style="width: 60px;" aria-label="CSS grade: activate to sort column ascending">
                           UNAME
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 266px;" aria-label="Browser: activate to sort column ascending">
                            商品名
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 170px;" aria-label="Engine version: activate to sort column ascending">
                            星级
                        </th>
                        
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 170px;" aria-label="Engine version: activate to sort column ascending">
                            内容
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           时间
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-label="CSS grade: activate to sort column ascending">
                           状态
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($data as $v)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->uname}}</td>
                        <td>{{$v->gname}}</td>
                        <td style="color:red">{{str_repeat("★",$v->start)}}{{str_repeat("☆",5-$v->start)}}</td>
                        <td>{{$v->text}}</td>
                        <td>{{date("Y-m-d H:i:s",$v->time)}}</td>
                        <td>
                            <select name="" onchange="a(this,{{$v->id}})" id="">
                            @if($v->statu==1)
                                <option value="0">未审核</option>
                                <option selected value="1">正常</option>
                                <option value="2">黑名单</option>
                                
                            @elseif($v->statu==2)
                                <option value="0">未审核</option>
                                <option value="1">正常</option>
                                <option selected value="2">黑名单</option>
                            @else
                                <option selected value="0">未审核</option>
                                <option value="1">正常</option>
                                <option value="2">黑名单</option>
                            @endif
                            </select>
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
            </div>
        </div>
    </div>
</div>
    
<script>
    function a(obj,id){
        //获取自己的值
        val=$(obj).val();
        //发送ajax请求
        $.post("/admin/comment/ajaxStatu",{"id":id,"statu":val,"_token":'{{csrf_token()}}'},function(data){

            if(data == 1){
             alert('修改成功');
                         
              

            }else{
                alert('修改失败');
            }


        })
    }

</script>
    
@endsection

@section('js')


@endsection