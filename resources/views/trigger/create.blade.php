@extends('master')

@section('content')
<h1> TRIGGER CREATE </h1>
{!! Form::open(['action' =>'TriggerController@store', 'method' => 'post']) !!}
<div class='panel panel-info'>
    <div class='panel-heading'>
        <h4>New Trigger</h4>
    </div>
    @include('trigger.p_create')
</div>
{!! Form::close() !!}
@stop