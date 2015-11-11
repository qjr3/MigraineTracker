@extends('master')

@section('title')

Log into
    
@stop


@section('header')

@stop


@section('content')

    @include('errors.list')
    <div class='panel panel-info'>
        <div class='panel-heading'>    
            {!! Form::open(['action' => 'Auth\AuthController@postLogin']) !!}
            <h1>Sign In</h1>
        </div>
        <div class='panel-body'>
            <div class='form-group'>
                {!! Form::label('email', 'Email Address', ['class' => 'sr-only']) !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'type' => 'email', 'placeholder' => 'Email Address']) !!}
            </div>

            <div class='form-group'>
                {!! Form::label('password', 'Password', ['class' => 'sr-only']) !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
            </div>
        </div>
        <div class='panel-footer'>
            <div class='row'>
                <div class='col-sm-6'>
                   <div class='form-group'>
                        {!! Form::submit('Login', ['class' => 'btn btn-default btn-primary']) !!}
                    </div>
                </div>
                <div class='col-sm-6'>
                    <div class='form-group text-right'>
                        {!! link_to_action('Auth\AuthController@getRegister', 'Create New Account', array(), ['class' => 'btn btn-default btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('footer')

@stop