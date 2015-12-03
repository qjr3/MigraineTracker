@extends('master')

@section('title')
    Welcome to Migraine Tracker
@stop

@section('content')
    <div class="col-md-12">
        <div class="text-center">
            <div class="h1">MigraineTracker</div>
            <p>MigraineTracker is an online software product to help you track your track migraines and assist you with
                your ongoing needs as a victim of intense migraines. We aim to provide the tools you need to prevent
                migraines from occuring so that you can live a normal life!</p>

            <div>
                {!! link_to_action('Auth\AuthController@getRegister','New User Registration',['class'=>'btn btn-info']) !!}
            </div>

        </div>
        <br>

        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['action' => 'Auth\AuthController@postLogin']) !!}
            <div class="col-md-6">
                <div class='form-group'>
                    {!! Form::label('email', 'Email Address', ['class' => 'sr-only']) !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'type' => 'email', 'placeholder' => 'Email Address']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class='form-group'>
                    {!! Form::label('password', 'Password', ['class' => 'sr-only']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                </div>
            </div>
           <div class="col-md-4 col-md-offset-4">
               <div class='form-group'>
                   {!! Form::submit('Login', ['class' => 'btn  btn-block btn-default btn-primary']) !!}
               </div>
           </div>


            {!! Form::close() !!}
        </div>
    </div>


@stop