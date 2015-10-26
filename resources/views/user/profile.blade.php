@extends('master')

@section('title')User Profile @stop

@section('content')

<div class="col-md-12"><h1>{{ $user->name }}</h1></div>
<div class="col-md-4">
	<h3>Account Info</h3>
	<hr>
</div>
<div class="col-md-8">
	<h3>General Info</h3>
	<hr>
</div>
@stop

