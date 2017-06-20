@extends('common.bsframe')
@section('content')
<div class="details_operation clearfix">
    <div class="bui_select">
        <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addCate()">
    </div>
        
</div>
<table class="table" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th width="15%">编号</th>
            <th width="25%">分类</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cate as $cates)
        <tr>
            <!--这里的id和for里面的c1 需要循环出来-->
            <td>{{$cates->id}}</td>
            <td>{{$cates->cName}}</td>
            <td align="center"><a href="{{url('admin/cate/'.$cates->id.'/edit')}}">修改</a>&nbsp;&nbsp&nbsp;&nbsp<a href="javascript:void(0)" onclick="delCate({{$cates->id}})">删除</a></td>
        </tr>
        @endforeach
    </tbody>
    
</table>
<div class="pull-right">
            {{ $cate->render() }}
</div>
	<script type="text/javascript">
	function delCate(id){
		if(window.confirm("您确定要删除吗？删除之后不能恢复哦！！！")){
			window.location="{{url('admin/cate')}}/"+id;
			//$.post("{{url('admin/cate/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){}); 
		}
	}
	</script>
@stop