@extends('common.bsframe')
@section('content')
<h3>修改商品</h3>
<form action="{{url('admin/pro/'.$pro->id)}}" method="post" enctype="multipart/form-data">
<table class="table">
	<tr>
		<td align="right">商品名称</td>
		<td><input type="text" name="pName"  value ="{{$pro->pName}}"/></td>
	</tr>
	<tr>
		<td align="right">商品分类</td>
		<td>
		<select name="cId">
			@foreach($cate as $cates)
			@if($cates->id==$pro->cId)
			    <option value="{{$cates->id}}">{{$cates->cName}}--当前</option>
			@else 
				<option value="{{$cates->id}}">{{$cates->cName}}</option>
			@endif
			@endforeach
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">商品货号</td>
		<td><input type="text" name="pSn"  value="{{$pro->pSn}}"/></td>
	</tr>
	<tr>
		<td align="right">商品数量</td>
		<td><input type="text" name="pNum"  value="{{$pro->pNum}}"/></td>
	</tr>
	<tr>
		<td align="right">商品市场价</td>
		<td><input type="text" name="mPrice"  value="{{$pro->mPrice}}"/></td>
	</tr>
	<tr>
		<td align="right">商品慕课价</td>
		<td><input type="text" name="iPrice"  value="{{$pro->iPrice}}"/></td>
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
			<a href="javascript:void(0)" id="selectFileBtn">添加附件</a>
			<div id="attachList" class="clear"></div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="发布商品"/></td>
	</tr>
	<input type="hidden" name="_method" value="PATCH">    <!-- {{ method_field('PUT') }} -->
	{{ csrf_field() }}   <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
</table>
</form>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
</script>
@stop