@extends('common.frame')

@section('content')
<?php $arr=session('cart')?>
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
	   @foreach($arr as $pro)
	   <tr>
		<td width='240'>tupian</td>
        <td width='120'>{{$pro->pName}}</td>
        <td width='120'>{{$pro->iPrice}}</td>
        <td width='120'>{{$pro->num}}</td>
        <td width='120'>￥{{$pro->price}}</td>
        <td width='120'><a href='do.php?act=del&key={$key}' onclick='delcfm();'>删除</a></td>
        </tr>
        @endforeach
				<!--循环的结束-->
            <tr>
            <td colspan="6" align="right"><B>总计：￥</B></td>
            </tr>
            <tr>
            <td colspan="6" align="right"><a href="checkout.php"><img src="img/buy_now.png"></a></td>
            </tr>
			</table>
			
	</div>
@else
    <p align='center'><img src='static/bootstrap/img/baoqian.png'></p>
 @endif
@stop