@extends('master')

@section('title')
Welcome to Migraine Tracker
@stop


@section('header')

@stop




@section('content')
<div class="container">
    <div class="content">
        <div class="title">Migraine Tracker</div>
        <?php 
        	$class = ['class' => 'btn btn-block'];
        ?>
        <div class="btn-group">
        	{!! link_to_action('UserController@login', 'Login', array(), $class) !!}
        	{!! link_to_action('UserController@create', 'New User', array(), $class) !!}
        	{!! link_to_action('TestController@index', 'Testing Area', array(), $class) !!}
        </div>
    
    </div>
</div>
@stop


@section('footer')

@stop