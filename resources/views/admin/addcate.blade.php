@extends('common.bsframe')
@section('content')
<form action="{{url('admin/cate')}}" method="post">
<table class="table" >
	<tr>
		<td align="right">分类名称</td>
		<td><input type="text" name="cName" placeholder="请输入分类名称"/></td>
	</tr>
	<tr>
		<td colspan="2" align="right"><input type="submit"  value="添加分类"/></td>
		{{ csrf_field() }}
	</tr>
</table>
</form>
@stop