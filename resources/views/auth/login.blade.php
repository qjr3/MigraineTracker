@extends('master')

@section('title')

@stop


@section('header')

@stop


@section('content')


{!! Form::open(['action' => 'Auth\AuthController@postLogin']) !!}

<div class='form-group'>
    {!! Form::label('Email') !!}
    {!! Form::text('email') !!}
</div>

<div class='form-group'>
    {!! Form::label('Password') !!}
    {!! Form::text('password') !!}
</div>

<div class='form-group'>
    {!! Form::submit('Login', ['class' => 'btn btn-default btn-primary']) !!}
</div>
{!! Form::close() !!}
@stop


@section('footer')

@stop