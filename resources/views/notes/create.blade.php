@extends('master')

@section('content')
    
    <div class='panel panel-default'>
        <div class='panel-heading'>
            <h4>New Note</h4>
        </div>
        <div class='panel-body'>
            {!! Form::open(['action' =>'NoteController@store', 'method' => 'post']) !!}
            <!-- Name Form Input -->
            <div class="form-group">
                {!! Form::label('name', 'Note Name:', ['class' => 'form-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <!-- Description Form Input -->
            <div class="form-group">
                {!! Form::label('body', 'Note Body:', ['class' => 'form-label']) !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::close() !!}
        </div>
        <div class="panel-footer">
            <div class="text-right">
                {!! Form::submit('Add Note', ['class' => 'btn btn-info']) !!}
            </div>
        </div>
    </div>

@stop