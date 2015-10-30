@extends('master')

@section('title')User Profile @stop

@section('content')

<div class="col-md-2">
	<h3>Personal Info</h3>
	<hr>
	<div class="clearfix">
		<strong><p class="text-primary pull-left">Username:</p> <div class="pull-right">{{ $user->name }}</div></strong>
	</div>
	<div class="clearfix">
		<strong><p class="text-primary pull-left">First Name:</p> <div class="pull-right">{{ $user->first_name }}</div></strong>
	</div>
	<div class="clearfix">
		<strong><p class="text-primary pull-left">Last Name:</p> <div class="pull-right">{{ $user->last_name }}</div></strong>
	</div>
	<div class="clearfix">
		<strong><p class="text-primary pull-left">Email:</p> <div class="pull-right">{{ $user->email }}</div></strong>
	</div>
</div>
<div class="col-md-10">
	<h3>General Info</h3>
	<hr>
</div>
@stop

