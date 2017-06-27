@extends('common.frame')

@section('content')
<?php 
$arr=null;
if(session('cart')){
$arr=session('cart');
//dd($arr);
}?>
<div class="product-big-title-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="product-bit-title text-center">
						<h2>购物车</h2>
					</div>
				</div>
			</div>
		</div>
</div>
@if($arr)
<div class="single-product-area">
			<table align="center">
				<tr>
					<th>商品图片</th>
					<th>商品名称</th>
					<th>商品单价</th>
					<th>数量</th>
					<th>单品总价</th>
					<th>操作</th>
				</tr>

				  
	
				<!-- 循环的开始 -->
	   @foreach($arr as $key=>$pro)
	   <?php $img=$pro->getImgById($pro->id)?>
	   <tr>
		<td width='180'><img alt="" src="image/{{$img->albumPath}}" width='110' height='110'></td>
        <td width='120'>{{$pro->pName}}</td>
        <td width='120'>{{$pro->iPrice}}</td>
        <td width='120'>{{$pro->num}}</td>
        <td width='120'>￥{{$pro->price}}</td>
        <td width='120'><input type="button" value="删除" class="btn"onclick="delPro({{$key}})"></td>
        </tr>
        @endforeach
				<!--循环的结束-->
            <tr>
            <td colspan="6" align="right"><B>总计：￥{{session('total')}}</B></td>
            </tr>
            <tr>
            <td colspan="6" align="right"><a href="checkout.php"><img src="static/bootstrap/img/buy_now.png"></a></td>
            </tr>
			</table>
			
	</div>
@else
    <p align='center'><img src='static/bootstrap/img/baoqian.png'></p>
 @endif
 <script type="text/javascript">
	function delPro(key){          //AJAX（异步）模拟delete方法
		if(window.confirm("您确认要删除嘛？添加一次不易，且删且珍惜!")){
			$.post("{{url('cart')}}/"+key,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
				 alert(data.msg);
				 location.reload(); //页面刷新 或者history.go(0)  history.go(-1) --返回上一页 
				})
		} 
		//window.location="{{url('cart')}}/"+key;

	}
</script>
@stop