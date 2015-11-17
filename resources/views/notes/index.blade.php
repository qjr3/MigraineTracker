@extends('master')

@section('content')
<div class='panel panel-info'>
    <div class='panel-heading'>
        <div class='row'>
            <div class='col-xs-6 h4'>Notes</div>
            <div class='col-xs-6 text-right'>{!! link_to_action('NoteController@create', 'Add Note', [], ['class' => 'btn btn-info btn-primary text-right']) !!}</div>
        </div>
    </div>
    <div class='panel-body'>
        @include('notes.p_index')
    </div>
</div>
@stop