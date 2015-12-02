@extends('master')

@section('content')
{!! Form::open(['action' =>'MedicineController@store', 'method' => 'post']) !!}
<div class='panel panel-default'>
    <div class='panel-heading'>
        <h4>Add Medicine</h4>
    </div>
    <div class='panel-body'>
@include('medicine.p_create')
    </div>
@stop