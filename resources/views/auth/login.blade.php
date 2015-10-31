@extends('master')

@section('title')

@stop


@section('header')

@stop


@section('content')

<div class="col-md-6 col-md-offset-3">
	{!! Form::open(['action' => 'Auth\AuthController@postLogin']) !!}
	<h1> Sign In</h1>
	<div class='form-group'>
	    {!! Form::label('email', 'Email Address', ['class' => 'sr-only']) !!}
	    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
	</div>

	<div class='form-group'>
	    {!! Form::label('password', 'Password', ['class' => 'sr-only']) !!}
	    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
	</div>

	<div class='form-group text-center'>
	    {!! Form::submit('Login', ['class' => 'btn btn-default btn-primary']) !!}
	</div>
	{!! Form::close() !!}
</div>
@stop


@section('footer')

@stop