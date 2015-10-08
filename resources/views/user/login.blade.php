@extends('master')

@section('title')

@stop


@section('header')

@stop


@section('content')


{!! Form::model('User::class') !!}

<div class='form-group'>
    {!! Form::label('User Name') !!}
    {!! Form::text('username') !!}
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