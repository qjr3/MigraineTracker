<!doctype html>
<html lang="en" manifest="a.manifest">
<head>
        <title>@yield('title')</title>
        
        <!-- Include JQuery from CDN -->
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        
        <!-- Include AngularJS from CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.min.js"></script>
	
        <!-- Include TwitterBootStrap from CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
        <!-- UTF8 FTW -->
        <meta charset="utf-8">
        
        <!-- Force IE/EDGE compatible mode -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <!-- Setup for mobile device screen layout -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Setup iOS mobile devices icons and interface -->
        <link rel="apple-touch-icon" href="touch-icon-iphone.png">
        <link rel="apple-touch-icon" sizes="76x76" href="touch-icon-ipad.png">
        <link rel="apple-touch-icon" sizes="120x120" href="touch-icon-iphone-retina.png">
        <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad-retina.png">
        <link rel="apple-touch-startup-image" href="/startup.png">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
</head>

<body>
	
	@yield('header')
	
	@yield('content')
	
	@yield('footer')
	
</body>

</html>