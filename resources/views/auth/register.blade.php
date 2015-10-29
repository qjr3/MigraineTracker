@extends('master')

@section('title')
Create New User 
@stop


@section('header')

@stop


@section('content')


@include('errors.list')

<div class="col-md-6 col-md-offset-3">
	{!! Form::open(['action' => 'Auth\AuthController@postRegister']) !!}
	<h1> Create New User </h1>
	<div class='form-group'>
	    {!! Form::label('User Name'); !!}
	    {!! Form::text('name', null, ['class' => 'form-control'] ); !!}
	</div>
	<div class='form-group'>
	    {!! Form::label('Email Address') !!}
	    {!! Form::text('email', null, ['class' => 'form-control'] ) !!}
	</div>
	<div class='form-group'>
	    {!! Form::label('Password') !!}
	    {!! Form::password('password', ['class' => 'form-control'] ) !!}
	</div>
	<div class="form-group">
	    {!! Form::label('password_confirmation', 'Password:', ['class' => 'sr-only']) !!}
	    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
	</div>
	<div class='form-group'>
	    {!! Form::submit('Create Account', ['class' => 'btn btn-primary btn-default']) !!}
	</div>
	{!! Form::close() !!}
</div>
@stop


@section('footer')

@stop