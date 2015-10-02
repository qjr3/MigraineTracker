<!doctype html >
<html lang="en">
<head>
        <title>@yield('title')</title>
        
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.min.js"></script>

</head>

<body>
    
	@yield('header')
	
	@yield('content')
	
	@yield('footer')
	
</body>

</html>