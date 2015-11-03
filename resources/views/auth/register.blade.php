@extends('master')

@section('title')

Create New User 

@stop

@section('content')

@include('errors.list')

<div class="col-md-6 col-md-offset-3">
	{!! Form::open(['action' => 'Auth\AuthController@postRegister']) !!}
	<h1> Create New User </h1>
	<div class='form-group'>
	    {!! Form::label('name', 'Username', ['class' => 'sr-only']); !!}
	    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Username'] ); !!}
	</div>
	<div class='form-group'>
	    {!! Form::label('email', 'Email Address', ['class' => 'sr-only', 'type' => 'email']) !!}
	    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address'] ) !!}
	</div>
	<div class='form-group'>
	    {!! Form::label('password', 'Password', ['class' => 'sr-only']) !!}
	    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'] ) !!}
	</div>
	<div class="form-group">
	    {!! Form::label('password_confirmation', 'Password:', ['class' => 'sr-only']) !!}
	    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
	</div>
	<div class='form-group text-center'>
	    {!! Form::submit('Create Account', ['class' => 'btn btn-primary btn-default']) !!}
	</div>
	{!! Form::close() !!}
</div>

@stop