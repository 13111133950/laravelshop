@extends('common.bsframe')
@section('content')
<form action="{{url('admin/cate/'.$cate->id)}}" method="post">
<table class="table" cellspacing="0" cellpadding="0">
	<tr>
		<td align="right">分类名称<input type="hidden" name="_method" value="PATCH"></td>
		<td><input type="text" name="cName" placeholder="请输入修改后的分类名称"/></td>
	</tr>
	<tr>
		<td colspan="2" align="right"><input type="submit"  value="修改分类"/></td>
		{{ csrf_field() }}
	</tr>

</table>
</form>
@stop