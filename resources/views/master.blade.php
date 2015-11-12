<!doctype html>
<html lang="en">
<head>
        <title>@yield('title')</title>
        
        {!! Html::style('css/main.css') !!}
        {!! Html::script('js/jquery-1.11.3.min.js') !!}
        
        {!! Html::style('css/bootstrap.min.css') !!}
        {!! Html::script('js/bootstrap.min.js') !!}
        
        {!! Html::script('js/vue.min.js') !!}
        {!! Html::script('js/vue-resource.min.js') !!}

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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

    <div class='container-fluid'>
        <div class='row'>
            <div class='col-xs-1'></div>
            <div class='col-xs-10'>@include('partials.nav')</div>
            <div class='col-xs-1'></div>
        </div>
        <div class='row'>
            <div class='col-xs-1'></div>
                <div class='col-xs-10'>      
                    <div class='panel panel-info' style='background-color : rgba(255,255,255,.80);'>
                        <div class='panel-body' >
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                             @yield('content')
                        </div>
                    </div>
                </div>
            <div class='col-xs-1'></div>
        </div>
        <div class='row'>
            <div class='col-xs-1'></div>
                <div class='col-xs-10'>
                    <div class='panel panel-info' style='background-color : rgba(245,245,245,.80);'>
                        <div class='panel-body'>
                            @yield('footer') @include('partials.footer')
                        </div>
                    </div>  
                </div>
            <div class='col-xs-1'></div>
        </div>
    </div> 	   
</body>
</html>