<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>阿飞淘宝网@yield('title')</title>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('static/bootstrap/css/bootstrap.min.css')}}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('static/bootstrap/css/font-awesome.min.css')}}">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('static/bootstrap/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('static/bootstrap/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('static/bootstrap/css/responsive.css')}}">
    

  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                    <ul class="nav navbar-nav">
						@if (session('user'))
						<li><i class="fa fa-user"></i>欢迎你，{{session('user')}}</li>
						<li><a href="{{url('user/quit')}}"><i class="fa fa-user"></i> 注销</a></li>
						@else
						<li><a href="{{url('user/log')}}"><i class="fa fa-user"></i> 登录</a></li>
						<li><a href="{{url('user/reg')}}"><i class="fa fa-user"></i> 注册</a></li>
						@endif
					</ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="{{asset('static/bootstrap/img/logo.png')}}"></a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mainmenu-area">
		<div class="container">
			<div class="row">
				
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">主页</a></li>
						<li><a href="shop.php" target="mainFrame">商品大全</a></li>
						<li><a href="cart.php" target="mainFrame">购物车</a></li>
						
					</ul>
				</div>
			</div>
		</div>
	</div> <!-- End site branding area -->
    
    @yield('content')
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
					<div class="single-promo promo1">
						<i class="fa fa-refresh"></i>
						<p>30天无理由退换</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="single-promo promo2">
						<i class="fa fa-truck"></i>
						<p>包邮</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="single-promo promo3">
						<i class="fa fa-lock"></i>
						<p>支付安全</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="single-promo promo4">
						<i class="fa fa-gift"></i>
						<p>最新商品</p>
					</div>
				</div>
            </div>
        </div>
    </div> <!-- End promo area -->
    

    
    
    
   
    
    <div class="footer-bottom-area">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="copyright">
						<p>
							Copyright &copy; 2017.阿飞巴巴 All rights reserved.<a
								href="#top" target="_self">返回顶部</a>
						</p>
					</div>
				</div>

				<div class="col-md-4">
					<div class="footer-card-icon">
						<i class="fa fa-cc-discover"></i> <i class="fa fa-cc-mastercard"></i>
						<i class="fa fa-cc-paypal"></i> <i class="fa fa-cc-visa"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="{{asset('static/bootstrap/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('static/bootstrap/js/jquery.sticky.js')}}"></script>
    
    <!-- jQuery easing -->
    <script src="{{asset('static/bootstrap/js/jquery.easing.1.3.min.js')}}"></script>
    
    <!-- Main Script -->
    <script src="{{asset('static/bootstrap/js/main.js')}}"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="{{asset('static/bootstrap/js/bxslider.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('static/bootstrap/js/script.slider.js')}}"></script>
   

  </body>
</html>