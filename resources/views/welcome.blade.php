@extends('master')

@section('title')
Welcome to Migraine Tracker
@stop


@section('header')

@stop




@section('content')
<div class="col-md-12 content">
    <div class="title">Migraine Tracker</div>
    <?php 
    	$class = ['class' => 'btn btn-block'];
    ?>
    <div class="btn-group">
    	{!! link_to_action('Auth\AuthController@getLogin', 'Login', array(), $class) !!}
    	{!! link_to_action('Auth\AuthController@getRegister', 'New User', array(), $class) !!}
    	{!! link_to_action('TestController@index', 'Testing Area', array(), $class) !!}
    </div>
</div>
@stop


@section('footer')

@stop