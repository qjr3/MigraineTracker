@extends('master')

@section('title')

Log into
    
@stop


@section('header')

@stop


@section('content')
    @include('errors.list')
  
    {!! Form::open(['action' => 'Auth\AuthController@postLogin']) !!}
    <h3 class='text-center'>Sign In</h3>
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
@stop


@section('footer')

@stop