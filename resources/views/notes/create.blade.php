@extends('master')

@section('content')
    {!! Form::open(['action' =>'NoteController@store', 'method' => 'post']) !!}
    <div class='panel panel-default'>
        <div class='panel-heading'>
            <h4>New Note</h4>
        </div>

        <div class='panel-body'>
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


        </div>
        <div class="panel-footer">
            <div class="text-right">
                {!! Form::submit('Add Note', ['class' => 'btn btn-info']) !!}
            </div>
        </div>

    </div>
    {!! Form::close() !!}

@stop