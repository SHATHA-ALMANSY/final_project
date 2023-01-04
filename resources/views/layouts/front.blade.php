<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title> @yield('tital','task3')| {{ config('app.name') }}</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	<script type='text/javascript' src='js/mobile.js'></script>
</head>
<body>
	<div id="header">
		<h1><a href="index.html">Eng &amp; Prog <span>Shatha Ahmed Al-Mansy</span></a></h1>
		<ul id="navigation">
			<li>
				<a href="/">Home</a>
			</li>
			<li>
				<a href="/about">About</a>
			</li>
			<li>
				<a href="classes.html">Shope</a>
				
			</li>
			<li class="current">
				<a href="/contact">contact</a>
			</li>
			<li>
				<a href="blog.html">Blog</a>
			</li>
		</ul>
	</div>
	@yield('content')
	<div id="footer">
    <div>
			<span>123 St. City Location, Gaza | 987654321</span>
			<p>
				&copy; 2023 by engineer &amp; Shatha Ahmed Al-Mansy.
			</p>
		</div>
		<div id="connect">
			<a href="https://freewebsitetemplates.com/go/facebook/" id="facebook" target="_blank">Facebook</a>
			<a href="https://freewebsitetemplates.com/go/twitter/" id="twitter" target="_blank">Twitter</a>
			<a href="https://freewebsitetemplates.com/go/googleplus/" id="googleplus" target="_blank">Google&#43;</a>
			<a href="https://freewebsitetemplates.com/go/pinterest/" id="pinterest" target="_blank">Pinterest</a>
		</div>
	</div>
</body>
</html>