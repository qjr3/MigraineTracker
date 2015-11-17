<!--Momma, just killed a man....pulled my trigger now he's dead....
Momma, life has just begun.....-->
@extends('master')

@section('content')
    {!! Form::model($trigger, ['action' => ['TriggerController@update', $trigger->id], 'method' => 'PATCH']) !!}
    <div class='panel panel-info'>
        <div class='panel-heading'>
            <h4>Edit Trigger</h4>
        </div>
        <div class='panel-body'>
            <!-- Trigger Name Form Input -->
            <div class="form-group">
                {!! Form::label('name', 'Trigger Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <!-- Description Form Input -->
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>
            <div class="row">
                <div class='col-xs-12'>
                    <div class='form-group row'>
                        <div class='col-xs-4'>{!! Form::submit('Submit', ['class' => 'btn btn-block btn-primary btn-default']) !!}</div>
                        <div class='col-xs-offset-4 col-xs-4'><span class="pull-right btn btn-warning" style="margin-bottom: 15px">{!! link_to_action('TriggerController@index', 'Cancel', $trigger->id) !!}</span></div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop