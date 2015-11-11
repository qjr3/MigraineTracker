<!doctype html>
<html lang="en">
<head>
        <!-- Prevent Chrome (and others) from caching. Remove after developement -->
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="pragma" content="no-cache" />

        <title>@yield('title')</title>
        
        {!! Html::style('css/main.css') !!}
        {!! Html::script('js/jquery-1.11.3.min.js') !!}
        
        {!! Html::style('css/bootstrap.min.css') !!}
        {!! Html::script('js/bootstrap.min.js') !!}
        
        {!! Html::script('js/angular.min.js') !!}
        {!! Html::script('js/no-break.js') !!}
                
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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
        
        <!-- Other links -->
        @yield('style')
</head>

<body style='background-color: lightblue'>
    <div class="container">
        
        <!-- BEGIN Global Header -->
        <div id="header" class=' row'>
            @include('partials.nav')
        </div>
        <!-- END Global Header -->
        
        <div id='content' class=' row'>
            @yield('content')
        </div>
    
        <!-- BEGIN Global Footer -->
        <div id='footer' class=' row'>
            @yield('footer')
            @include('partials.footer') 
        </div>
        <!-- END Global Footer -->
    </div>
	   
</body>
</html>