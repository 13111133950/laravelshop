@extends('common.frame')

@section('content')
              
<div class="search1">
    <input type="submit" value="按价格排序">
    <select  onchange="change(this.value)">
    	<option>-请选择-</option>
        <option value="asc" >由低到高</option>
        <option value="desc">由高到底</option>
    </select>
    <input type="submit" value="搜索">
    <input type="text"  id="search"  name="key" onkeypress="search()">
</div>
    
    <div class="single-product-area">
		<div class="container">
			<div class="row2">
			
			@foreach($pros as $pro)
			<?php $img=$pro->getImgById($pro->id);?>
				
				<div class="col-md-2">
				
					<div class="single-shop-product">
					
						<div class="product-upper">
							 <img src="image/{{$img->albumPath}}"> 
						</div>
						<div class="product-carousel-price"><h4>
							<a href="{{url('detail')}}?id={{$pro->id}}" target="_blank" >{{$pro->pName}}</a>
						</h4></div>
						<div class="product-carousel-price">
							<ins>
								¥{{$pro->iPrice}}
							</ins>
						</div>

						<div class="product-option-shop">
							<a class="add_to_cart_button" 
								href="{{url('detail')}}?id={{$pro->id}}" target="_blank">查看详情</a>
						</div>
						
					</div>
					
				</div>
            @endforeach
            
			</div>
		</div>
     </div>
<script type="text/javascript">
 	function change(order){
		window.location="{{url('shop')}}?order="+order;
	}
	function search(){
		if(event.keyCode==13){
			var key=document.getElementById("search").value;
			window.location="{{url('shop')}}?key="+key;
		}
	}
</script>
 @stop             