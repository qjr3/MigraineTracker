@extends('sandbox.master')

@section('content')

<div class='panel panel-info'>
    <div class='panel-header'>
        <div class='row'>
            <div class='panel-title'>
                <span>Sandbox Create Something</span>
            </div> 
            <div>

            </div>        
        </div>
    </div>
    <div class='panel-body'>
        <div class='row'>
            @include('sandbox.p_create')
        </div>
    </div>
</div>

@stop
