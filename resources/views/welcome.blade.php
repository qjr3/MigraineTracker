@extends('master')

@section('title')
Welcome to Migraine Tracker
@stop

@section('content')

<div class="text-center">
    <div class="h1">MigraineTracker</div>
    <p>MigraineTracker is an online software product to help you track your track migraines and assist you with your ongoing needs as a victim of intense migraines. We aim to provide the tools you need to prevent migraines from occuring so that you can live a normal life!</p>
    <div class=''>            {!! link_to_action('Auth\AuthController@getRegister','New User Registration',['class'=>'btn btn-info']) !!}</div>

</div>
@stop