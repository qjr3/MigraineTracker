@extends('master')

@section('content')
<div class='panel panel-info'>
    <div class='panel-heading'>
        <div class='panel-title'>
            <span>Medication</span>
        </div>
    </div>
    <div class='body'>
        @include('medicine.p_index')
    </div>
</div>
@stop
