@extends('master')


@section('content')

    <h4>Add Note</h4>

    {!! Form::model($note, ['action' => ['NoteController@update', $note->id], 'method' => 'PATCH']) !!}

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
    <div class="text-right">
        {!! Form::submit('Add Note', ['class' => 'btn btn-info']) !!}
    </div>

    {!! Form::close() !!}

@stop