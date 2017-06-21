@extends('common.frame')

@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                                <input type="submit" value="搜索">
                                <input type="text"  id="search"  name="key" onkeypress="search()">
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="single-product-area">
        @foreach($cate as $cates)
            <div>
            	<span class="icon1"></span><h3>{{$cates->cName}}</h3>
            </div>
		<div class="container">
		
		

			
			<div class="row2">
             
			<?php $pros=$cates->getProBycId($cates->id);?>
			@foreach($pros as $pro)
			<?php $img=$pro->getImgById($pro->id);?>
				
				<div class="col-md-2">
				
					<div class="single-shop-product">
					
						<div class="product-upper">
							 <img src="image/{{$img->albumPath}}" alt=""> 
						</div>
						<div class="product-carousel-price"><h4>
							<a href="{{url('detail')}}?id={{$pro->id}}" target="_blank"  >{{$pro->pName}}</a>
						</h4></div>
						<div class="product-carousel-price">
							<ins>
								¥{{$pro->iPrice}}
							</ins>
						</div>

						<div class="product-option-shop">
							<a class="add_to_cart_button" 
								href="details.php?id={{$pro->id}}" target="mainFrame">查看详情</a>
						</div>
						
					</div>
					
				</div>
            @endforeach
			
			</div>
			

		</div>
	@endforeach
     </div>
<script type="text/javascript">
	function search(){
		if(event.keyCode==13){
			var key=document.getElementById("search").value;
			window.location="{{url('shop')}}?key="+key;
		}
	}
</script>
 @stop             