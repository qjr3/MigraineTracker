@extends('master')

@section('content')
<div class='panel panel-info'>
    <div class='panel-heading'>
        <div class='row'>
            <div class='col-xs-6 h4'>Journals</div>
            <div class='col-xs-6 text-right'>{!! link_to_action('JournalController@create', 'Add Journal', array(), ['class' => 'btn btn-success text-right']) !!}</div>
        </div>
    </div>
    <div class='panel-body'>
        @include('journal.p_index')
    </div>
</div>
@stop