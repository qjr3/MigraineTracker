<!doctype html>
<html lang="us-en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<link rel="stylesheet" src="main.css">
	
	@yield('extra-head')
	
</head>
<body>
	@yield('header')
	
	@yield('content')
	
	@yield('footer')
	
</body>
</html>