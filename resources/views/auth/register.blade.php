@extends('master')

@section('title')

Sign Up Now with MigraineTracker!

@stop

@section('content')

@include('errors.list')
<div class='panel panel-info'>
    {!! Form::open(['action' => 'Auth\AuthController@postRegister']) !!}
    <div class='panel-heading'>
        <span class='h3 panel-title'> Create New User </span>
    </div>
    <div class='panel-body'>

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
    </div>
    <div class='panel-footer'>
        <div class='row'>
        <div class='form-group col-sm-6'>
                {!! Form::submit('Create New Account', ['class' => 'btn btn-default btn-primary']) !!}
        </div>

        <div class='form-group col-sm-6 text-right'>
            {!! link_to_action('Auth\AuthController@getLogin', 'Login to existing account.', array(), ['class' => '']) !!}

        </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop