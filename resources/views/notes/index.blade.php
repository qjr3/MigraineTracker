@extends('master')

@section('content')
<div class='panel panel-info'>
    <div class='panel-heading'>
        <div class='panel-title'>
            <span>Notes</span>
        </div>
    </div>
    <div class='body'>
        @include('notes.p_index')
    </div>
</div>
@stop