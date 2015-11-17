<!--/drugs are bad...mkay?-->
@extends('master')

@section('content')
    {!! Form::model($medicine, ['action' => ['MedicineController@update', $medicine->id], 'method' => 'PATCH']) !!}
    <div class='panel panel-info'>
        <div class='panel-heading'>
            <h4>Edit Medicine</h4>
        </div>
        <div class='panel-body'>
            <!-- Medicine Name Form Input -->
            <div class="form-group">
                {!! Form::label('name', 'Medicine Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <!-- Description Form Input -->
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>
            <!-- Dose Form Input -->
            <div class="form-group">
                {!! Form::label('dose', 'Dosage:') !!}
                {!! Form::text('dose', null, ['class' => 'form-control']) !!}
            </div>
            <div class="row">
                <div class='col-xs-12'>
                    <div class='form-group row'>
                        <div class='col-xs-4'>{!! Form::submit('Submit', ['class' => 'btn btn-block btn-primary btn-default']) !!}</div>
                        <div class='col-xs-offset-4 col-xs-4'><span class="pull-right btn btn-warning" style="margin-bottom: 15px">{!! link_to_action('MedicineController@index', 'Cancel', $medicine->id) !!}</span></div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop
