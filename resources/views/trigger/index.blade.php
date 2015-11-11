@extends('master')

@section('content')
<div class='panel panel-info'>
    <div class='panel-heading'>
        <div class='panel-title'>
           <div class='row'>
                <div class='col-xs-6 h4'>Triggers</div>
                <div class='col-xs-6 text-right'>{!! link_to_action('TriggerController@create', 'Add Trigger', array(), ['class' => 'btn btn-info btn-primary text-right']) !!}</div>
            </div>

        </div>
    </div>
    <div class='panel-body'>
        @include('trigger.p_index', $triggers)
    </div>
</div>
@stop