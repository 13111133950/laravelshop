<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>用户登录</title>
<link rel="stylesheet" href="{{asset('static/bootstrap/css/loginstyle.css')}}">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"
	content="Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<link rel="stylesheet" type="text/css" href="{{asset('static/bootstrap/css/loginstyle.css')}}">

</head>
<body>
	<div class="login">
		<h2>阿飞淘宝网</h2>
		<div class="login-top">
			<h1>登录</h1>
			<form action="" method="post" >
				 <table align="center" width="350" border="0" class="tb1">
						    	<tr>
						    		<td align="right">用户名：</td>
						    		<td>
						    			<input type="text" name="username">
						    		</td>
						    		{{ csrf_field() }}
						    	</tr>
						    	<tr>
						    		<td align="right">密&nbsp&nbsp码：</td>
						    		<td>
						    			<input type="password" name="password">
						    		</td>
						    	</tr>
						    	
			    </table>
<div align="right"><input type="checkbox" id="a1" class="checked" name="autoFlag" value="1"><label for="a1">自动登陆(一周内自动登陆)</label></div>
				<div class="forgot">
					<input type="submit" value="Login">
				</div>
			</form>
		</div>
		<div class="login-bottom">
			<h3>
				新用户 &nbsp;<a href="reg.php">注册</a>
			</h3>
		</div>
	</div>
	<div class="copyright">
		<p>Copyright &copy; 2017.阿飞巴巴 All rights reserved.</p>
	</div>


</body>
</html>