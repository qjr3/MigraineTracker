@extends('master')

@section('title')
Welcome to Migraine Tracker
@stop

@section('content')

<div class="col-md-12 content">
    <div class="h1">MigraineTracker</div>
    <p class='clearfix'>MigraineTracker is an online software product to help you track your track migraines and assist you with your ongoing needs as a victim of intense migraines. We aim to provide the tools you need to prevent migraines from occuring so that you can live a normal life!</p>
    <div class='container center-block'>
        {!! link_to_action('Auth\AuthController@getLogin', 'Login', null,  ['class' => 'btn btn-primary btn-lg']) !!}
        &nbsp;&nbsp;&nbsp;&nbsp;
        {!! link_to_action('Auth\AuthController@getRegister', 'Sign Up', null,  ['class' => 'btn btn-primary btn-lg']) !!}
    </div>
</div>
<br />
@stop