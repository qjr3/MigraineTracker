@extends('master')

@section('content')
<div class='panel panel-info'>
    <div class='panel-heading'>
        <div class='panel-title'>
            <span>Triggers</span>
        </div>
    </div>
    <div class='body'>
        @include('trigger.p_index')
    </div>
</div>
@stop