@extends('layout.admin')

@section('title',$title)
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">

    		


    	<form action="/admin/goods" method='post' class="mws-form" enctype='multipart/form-data'>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">类别名称</label>
                    <div class="mws-form-item">
                        <select name="c_id" class="small">
                            <option value="0">请选择</option>
                            @foreach($res as $k=>$v)
                            <option value="{{$v->id}}">{{$v->title}}</option>
                            @endforeach
                        </select>
                    </div>
    			</div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品名称</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='gname'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">价格</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='price'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">库存</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='stock'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">颜色</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='color'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品图片</label>
                    <div class="mws-form-item">
                        <input type="file" class="fileinput-preview" readonly="readonly" name='gpic[]' multiple>
                    </div>
                </div>

                
                

               




                <script>
                    
                    //实例化编辑器
                    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                    var ue = UE.getEditor('editor');

                </script>


                <div class="mws-form-row">
                    <label class="mws-form-label">商品描述</label>
                    <div class="mws-form-item">
                         <script id="editor" name='descr' type="text/plain" style="width:700px;height:300px;"></script>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品状态</label>
                    <div class="mws-form-item">
                        
                        <input type="radio" name="status" value="1" checked>上架
                        <input type="radio" name="status" value="0" >下架
                    </div>
                </div>

                   			
    		</div>
    		<div class="mws-button-row">

    			{{csrf_field()}}
    			<input type="submit" class="btn btn-success" value="提交">
    		</div>
    	</form>
    </div>    	
</div>

@endsection

@section('js')
	<script>
		
		$('.mws-form-message').fadeOut(5000);
	</script>

@endsection