<!doctype html>
<html lang="en" manifest="a.manifest">
<head>
        <!-- Prevent Chrome (and others) from caching. Remove after developement -->
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="pragma" content="no-cache" />

        <title>@yield('title')</title>
        
        {!! Html::style('css/main.css') !!}
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
        
        <!-- Setup iOS mobile devices icons and interface -->
        <link rel="apple-touch-icon" href="touch-icon-iphone.png">
        <link rel="apple-touch-icon" sizes="76x76" href="touch-icon-ipad.png">
        <link rel="apple-touch-icon" sizes="120x120" href="touch-icon-iphone-retina.png">
        <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad-retina.png">
        <link rel="apple-touch-startup-image" href="/startup.png">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
</head>

<body style='margin: 0; padding: 0; width: 100%;'>
	<!-- BEGIN Global Header -->
        <div id='header_nav' class='container navbar navbar-fixed-top '>
            <table border='1' width="100%" class=''>
                <tbody>
                    <tr class=''>
                        <td id='menu' class='col-lg-3 center-block'>MENU</td>
                        <td class='col-lg-3 center-block'>
                            <table class=''>
                                    <tr class=''><td id='user-name' class='center-block col-lg-1'>USER NAME</td></tr>
                                    <tr class=''><td id='activity' class='center-block col-lg-1'>ACTIVITY</td></tr>
                            </table>
                        </td>
                        <td id='current_prediction' class='col-lg-3 center-block'>PREDICTED RISK</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END Global Header -->
        
        <div id='header' class='container'>            
            @yield('header')
        </div>
        
        <div id='content' class='container'>
            @yield('content')
        </div>
        
        <div id='footer' class='container'>
            @yield('footer')
        </div>
	
        <!-- BEGIN Global Footer -->
        <div id='footer_nav' class='container navbar navbar-fixed-bottom'>
            <table border='1' width="100%" class=''>
                <tbody>
                    <tr>
                        <td class='col-lg-3 center-block'>Terms of Use</td>
                        <td class='col-lg-3 center-block'>Copyright 2015</td>
                        <td class='col-lg-3 center-block'>Privacy Policy</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END Global Footer -->
</body>

</html>