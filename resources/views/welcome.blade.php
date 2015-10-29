@extends('master')

@section('title')

Welcome to Migraine Tracker

@stop

@section('content')

<div class="col-md-12 content">

	<div class="jumbotron">
	  <div class="title">MigraineTracker</div>
	  <p>MigraineTracker is an online software product to help you track your
	  	 track migraines and assist you with your ongoing needs as a victim
	  	 of intense migraines. We aim to provide the tools you need to prevent
	  	 migraines from occuring so that you can live a normal life!</p>
	  	 <p>{!! link_to_action('Auth\AuthController@getRegister', 'Sign Up', array(),  ['class' => 'btn btn-primary btn-lg']) !!}</p>
	</div>
</div>

@stop