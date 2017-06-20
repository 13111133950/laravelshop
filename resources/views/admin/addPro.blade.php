@extends('common.bsframe')
@section('content')
<h3>添加商品</h3>
<form action="{{url('admin/pro')}}" method="post" enctype="multipart/form-data"> <!-- enctype="multipart/form-data"  上传 -->
<table class="table">
	<tr>
		<td align="right">商品名称</td>
		<td><input type="text" name="pName"  placeholder="请输入商品名称"/></td>
	</tr>
	<tr>
		<td align="right">商品分类</td>
		<td>
		<select name="cId">
			@foreach($cate as $cates)
				<option value="{{$cates->id}}">{{$cates->cName}}</option>
			@endforeach
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">商品货号</td>
		<td><input type="text" name="pSn"  placeholder="请输入商品货号"/></td>
	</tr>
	<tr>
		<td align="right">商品数量</td>
		<td><input type="text" name="pNum"  placeholder="请输入商品数量"/></td>
	</tr>
	<tr>
		<td align="right">商品市场价</td>
		<td><input type="text" name="mPrice"  placeholder="请输入商品市场价"/></td>
	</tr>
	<tr>
		<td align="right">商品慕课价</td>
		<td><input type="text" name="iPrice"  placeholder="请输入商品慕课价"/></td>
	</tr>
	<tr>
		<td align="right">商品描述</td>
		<td>
			<textarea name="pDesc" id="editor_id" style="width:100%;height:150px;"></textarea>
		</td>
	</tr>
	<tr>
		<td align="right">商品图像</td>
		<td>
			<!-- <label for="file" >请选择文件</label> -->
            <input id="file" type="file" name="source">
		</td>
		
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="发布商品"/></td>
	</tr>
	{{ csrf_field() }}
</table>
</form>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
</script>
@stop