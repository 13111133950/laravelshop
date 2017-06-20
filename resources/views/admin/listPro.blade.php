@extends('common.bsframe')
@section('content')
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addPro()">
                        </div>
                        <div class="fr">
                            <div class="text">
                                <span>商品价格：</span>
                                <div class="bui_select">
                                    <select id="" class="select" onchange="change(this.value)">
                                    	<option>-请选择-</option>
                                        <option value="asc" >由低到高</option>
                                        <option value="desc">由高到底</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                                <span>搜索</span>
                                <input type="text" value="" class="search"  id="search" onkeypress="search()" >
                            </div>
                        </div>
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="10%">编号</th>
                                <th width="20%">商品名称</th>
                                <th width="10%">商品分类</th>
                                <th width="10%">是否上架</th>
                                <th width="15%">上架时间</th>
                                <th width="10%">慕课价格</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pro as $pros)
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><label >{{$pros->id}}</label></td>
                                <td>{{$pros->pName}}</td>
                                <td>{{$pros->getCateById($pros->cId)}}</td>
                                <td>
                                	{{$pros->isShow==1?"上架":"下架"}}
                                </td>
                                 <td>{{date("Y-m-d H:i:s"),$pros->pubTime}}</td>
                                  <td>{{$pros->iPrice}}￥</td>
                                <td align="center">
                                				<input type="button" value="详情" class="btn" onclick="showDetail('{{$pros->id}}','{{$pros->pName}}')">
                                				<input type="button" value="修改" class="btn" onclick="editPro({{$pros->id}})">
                                				<input type="button" value="删除" class="btn"onclick="delPro({{$pros->id}})">
					                            <div id="showDetail{{$pros->id}}" style="display:none;">
					                        	<table class="table" cellspacing="0" cellpadding="0">
					                        		<tr>
					                        			<td width="20%" align="right">商品名称</td>
					                        			<td>{{$pros->pName}}</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品类别</td>
					                        			<td>{{$pros->getCateById($pros->cId)}}</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品货号</td>
					                        			<td>{{$pros->pSn}}</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品数量</td>
					                        			<td>{{$pros->pNum}}</td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">商品价格</td>
					                        			<td>{{$pros->mPrice}}</td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">幕课网价格</td>
					                        			<td>{{$pros->iPrice}}</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品图片</td>
					                        			<td>

					                        			 &nbsp;&nbsp;
					                        			</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">是否上架</td>
					                        			<td>
					                        				{{$pros->isShow==1?"上架":"下架"}}
					                        			</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">是否热卖</td>
					                        			<td>
					                        				{{$pros->isHot==1?"热卖":"正常"}}
					                        			</td>
					                        		</tr>
					                        	</table>
					                        	<span style="display:block;width:80%; ">
					                        	商品描述<br/>
					                        	{!!$pros->pDesc!!}  <!-- 不需要转义的写法 -->
					                        	</span>
					                        </div>
                                
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
<div class="pull-right">
            {{ $pro->render() }}
</div>
<script type="text/javascript">
	function showDetail(id,t){
	     $("#showDetail"+id).dialog({
		  height:"auto",
	      width: "auto",
	      position: {my: "center", at: "center",  collision:"fit"},
	      modal:false,//是否模式对话框
	      draggable:true,//是否允许拖拽
	      resizable:true,//是否允许拖动
	      title:"商品名称："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}
	function editPro(id){
		window.location="{{url('admin/pro')}}/"+id+"/edit";
	}
	function delPro(id){          //AJAX（异步）模拟delete方法
		if(window.confirm("您确认要删除嘛？添加一次不易，且删且珍惜!")){
			$.post("{{url('admin/pro')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
				 alert(data.msg);
				 location.reload(); //页面刷新 或者history.go(0)  history.go(-1) --返回上一页 
				})
		}
	}
	function change(order){
		window.location="{{url('pro')}}?order="+order;
	}
	function search(){
		if(event.keyCode==13){
			var key=document.getElementById("search").value;
			window.location="{{url('pro')}}?key="+key;
		}
	}
</script>
@stop