@extends('common.frame')

@section('content')

<?php $img=$pro->getImgById($pro->id);?>
<div class="description_info comWidth">
	<div class="description clearfix">
		<div class="leftArea">
			<div class="description_imgs">
				<div class="big">
					<a href="" class="jqzoom" rel='gal1'  title="triumph" >
           			 <img width="309" height="340" src="image/{{$img->albumPath}}">
	        		</a>
				</div>
			</div>
		</div>
		<div class="rightArea">
			<div class="des_content">
				<h3 class="des_content_tit"><?php echo $pro['pName'];?></h3>
				<div class="des_position">
				  <div class="dl clearfix">
					<div class="dt">原价</div>
					<div class="dd clearfix"><span class="des_money"><del><em>￥</em><?php echo $pro['mPrice'];?></del></span></div>
				  </div>
				  <div class="dl clearfix">
					<div class="dt">优惠价</div>
					<div class="dd clearfix"><span class="des_money"><em>￥</em><?php echo $pro['iPrice'];?></span></div>
				  </div>
				  <div class="dl clearfix">
					<div class="dt">库存</div>
					<div class="dd clearfix"><span class="des_money"><em></em><?php echo $pro['pNum'];?>件</span></div>
				  </div>
				
					<div class="dl clearfix">
						<div class="dt colorSelect">选择颜色</div>
						<div class="dd clearfix">
							<div class="des_item des_item_acitve">
								黑
							</div>
							<div class="des_item">
								白
							</div>
							<div class="des_item">
								蓝
							</div>
						</div>
					</div>
					
					<div class="dl">
						<div class="dt des_num">数量</div>
						<div class="dd clearfix">
							<div class="des_number">
								<div class="reduction"><span id="jian" onclick="jian();">-</span></div>
								<div class="des_input">
									<input type="text" id="number" name="number" value="1" size="1" />
								</div>
								<div class="plus"><span id="jia" onclick="jia();">+</span></div>
							</div>
							<span class="xg">限购<em>9</em>件</span>
						</div>
					</div>
				</div>

				<div class="shop_buy">
					<a href="javascript:add(<?php echo $pro['id'];?>)" class="shopping_btn"><img src="static/bootstrap/img/buy_btn.jpg"></a>
					<span class="line"></span>
					<a href="#" class="buy_btn"></a>
				</div>
				<div class="notes">
					注意：此商品可提供普通发票，不提供增值税发票。
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hr_15"></div>
<div class="des_info comWidth clearfix">
	<div class="leftArea">
		<div class="recommend">
			<h3 class="tit">同价位</h3>
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="#"><img src="images/shopImg.jpg" alt=""></a>
					</div>
					<p><a href="#">文字介绍文字介绍文字介绍文字介绍文字介绍文字介绍</a></p>
					<p class="money">￥888</p>
				</div>
			</div>
		
		</div>
		<div class="hr_15"></div>
		<div class="recommend">
			<h3 class="tit">同价位</h3>
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="#"><img src="images/shopImg.jpg" alt=""></a>
					</div>
					<p><a href="#">文字介绍文字介绍文字介绍文字介绍文字介绍文字介绍</a></p>
					<p class="money">￥888</p>
				</div>
			</div>
		</div>
	</div>
	<div class="rightArea">
		<div class="des_infoContent">
			<ul class="des_tit">
				<li class="active"><span>产品介绍</span></li>
				<li><span>产品评价(12312)</span></li>
			</ul>
			<!-- <div class="ad">
				<a href="#"><img src="images/ad.jpg"></a>
			</div> 广告-->
			<div class="info_text">
				<!-- <p>现在就是买mini的好时候！换代清仓直降，但苹果品质不变！A5双核，内置Lightning闪电接口，正反可插，方便人性。小身材，炫丽的7.9英寸显示屏，7.2mm的厚度，薄如铅笔。女生包包随身携带更时尚！facetime视频通话，与密友24小时畅聊不断线。微信倾力打造，你的智能助理。苹果的牌子就不用我说了，1111补仓，存货不多哦！</p>
				<div class="hr_45"></div> -->
				<div class="info_tit">
					<h3>强烈推荐</h3><h4>货比三家，还选</h4>
				</div>
				<p><?php echo $pro['pDesc']?></p>
			</div>
		</div>
		<div class="hr_15"></div>
		<div class="des_infoContent">
			<h3 class="shopDes_tit">商品评价</h3>
			<div class="score_box clearfix">
				<div class="score">
					<span>4.7</span><em>分</em>
				</div>
				<div class="score_speed">
					<ul class="score_speed_text">
						<li class="speed_01">非常不满意</li>
						<li class="speed_02">不满意</li>
						<li class="speed_03">一般</li>
						<li class="speed_04">满意</li>
						<li>非常满意</li>
					</ul>
					<div class="score_num">
						4.7<i></i>
					</div>
					<p>共18939位慕课网友参与评分</p>
				</div>
			</div>
			<div class="review_tab">
				<ul class="review fl">
					<li><a href="#" class="active">全部</a></li>
					<li><a href="#">满意（3121）</a></li>
					<li><a href="#">一般（321）</a></li>
					<li><a href="#">不满意（1121）</a></li>
				</ul>
				<div class="review_sort fr">
					<a href="#" class="review_time">时间排序</a><a href="#" class="review_reco">推荐排序</a>
				</div>
			</div>
			<div class="review_listBox">
				<div class="review_list clearfix">
					<div class="review_userHead fl">
						<div class="review_user">
							<img src="images/userhead.jpg" alt="">
							<p>61***42</p>
							<p>金色会员</p>
						</div>
					</div>
					<div class="review_cont">
						<div class="review_t clearfix">
							<div class="starsBox fl"><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span></div>
							<span class="stars_text fl">5分 满意</span>
						</div>
						<p>赖慕课挺不错的信赖慕课挺不错的，信赖慕课</p>
						<p><a href="#" class="ding">顶(0)</a><a href="#" class="cai">踩(0)</a></p>
					</div>
				</div>
				<div class="review_list clearfix">
					<div class="review_userHead fl">
						<div class="review_user">
							<img src="images/userhead.jpg" alt="">
							<p>61***42</p>
							<p>金色会员</p>
						</div>
					</div>
					<div class="review_cont">
						<div class="review_t clearfix">
							<div class="starsBox fl"><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span></div>
							<span class="stars_text fl">5分 满意</span>
						</div>
						<p>赖慕课挺不错的信赖慕课挺不错的，信赖慕课</p>
						<p><a href="#" class="ding">顶(0)</a><a href="#" class="cai">踩(0)</a></p>
					</div>
				</div>
				<div class="hr_25"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

function add(id)
{ 
   var num =  document.getElementById("number").value; 
   window.location="{{url('cart')}}?id="+id+"&num="+num;
}
function jia()
{
   var num = parseInt(document.getElementById("number").value);
   if(num<100)
   {
      document.getElementById("number").value = ++num;
   }
}
function jian()
{
   var num = parseInt(document.getElementById("number").value);
   if(num>1)
   {
      document.getElementById("number").value = --num;
   }
}
</script>
 @stop             
