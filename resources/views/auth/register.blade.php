@extends('master')

@section('title')

Sign Up Now with MigraineTracker!

@stop

@section('content')

@include('errors.list')
    {!! Form::open(['action' => 'Auth\AuthController@postRegister']) !!}
    <h3 class='text-center'>Create New User </h3>
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