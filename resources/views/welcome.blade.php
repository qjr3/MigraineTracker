@extends('master')

@section('title')
Welcome to Migraine Tracker
@stop

@section('content')

<div class="text-center">
    <div class="h1">MigraineTracker</div>
    <p>MigraineTracker is an online software product to help you track your track migraines and assist you with your ongoing needs as a victim of intense migraines. We aim to provide the tools you need to prevent migraines from occuring so that you can live a normal life!</p>
        {!! Form::open(['action' => 'Auth\AuthController@postLogin']) !!}
    <h2>Sign In</h2>
    <div class='form-group'>
        {!! Form::label('email', 'Email Address', ['class' => 'sr-only']) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'type' => 'email', 'placeholder' => 'Email Address']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('password', 'Password', ['class' => 'sr-only']) !!}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
    </div>
    <div class='form-group'>
        {!! Form::submit('Login', ['class' => 'btn  btn-block btn-default btn-primary']) !!}
    </div>
    {!! Form::close() !!}         
</div>
<br />
{!! Form::open(['action' => 'Auth\AuthController@postRegister']) !!}
    <h2 class='text-center'>Create New Account </h2>
        <div class='form-group'>
            {!! Form::label('name', 'Username', ['class' => 'sr-only']); !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Username'] ); !!}
        </div>
        <div class='form-group'>
            {!! Form::label('email', 'Email Address', ['class' => 'sr-only', 'type' => 'email']) !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'type' => 'email', 'placeholder' => 'Email Address'] ) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('password', 'Password', ['class' => 'sr-only']) !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Password:', ['class' => 'sr-only']) !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
        </div>
        <div class='form-group'>
            {!! Form::submit('Register', ['class' => 'btn  btn-block btn-default btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@stop