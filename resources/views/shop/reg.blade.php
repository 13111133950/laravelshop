<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<title>用户注册</title>
<link href="{{asset('static/bootstrap/css/loginstyle.css')}}" rel="stylesheet" type="text/css" media="all" />


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"
	content="Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
</head>
<body>

	<div class="login">
		<h2>阿飞淘宝网</h2>
		<div class="login-top">
			<h1>注册</h1>
			<form action="" method="post" >
				<table align="center" width="350" border="0" class="tb1">
						    	<tr>
						    		<td align="right">用户名：</td>
						    		<td>
						    			<input type="text" name="username" value="{{old('username')}}">
						    		</td>
						    		{{ csrf_field() }}
						    	</tr>
						    	<tr>
						    		<td align="right">密&nbsp&nbsp码：</td>
						    		<td>
						    			<input type="password" name="password">
						    		</td>
						    	</tr>
						    	<tr>
						    		<td align="right">确认密码：</td>
						    		<td>
						    			<input type="password" name="password_confirmation">
						    		</td>
						    	</tr>
						    	<tr>
						    		<td align="right">联系电话：</td>
						    		<td>
						    			<input type="text" name="tel" value="{{old('tel')}}">
						    		</td>
						    	</tr>
						    	<tr>
						    		<td align="right">邮&nbsp&nbsp箱：</td>
						    		<td>
						    			<input type="text" name="email" value="{{old('email')}}">
						    		</td>
						    	</tr>
			    </table>
			<div class="forgot">
               <div class="text-danger">{{$errors->first()}}</div> <input type="submit" value="注册">
			</div>
			</form>
			
		</div>
		<div class="login-bottom">
			<h3>
				老用户 &nbsp;<a href="login.php">登录</a>
			</h3>
		</div>
	</div>

	<div class="copyright">
		<p>Copyright &copy; 2017.阿飞巴巴 All rights reserved.</p>
	</div>

</body>
</html>