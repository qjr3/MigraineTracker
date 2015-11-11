@extends('master')

@section('content')
<div class='panel panel-info'>
    <div class='panel-heading'>
           <div class='row'>
                <div class='col-xs-6 h4'>Medicines</div>
                <div class='col-xs-6 text-right'>{!! link_to_action('MedicineController@create', 'Add Medicine', array(), ['class' => 'btn btn-info btn-primary text-right']) !!}</div>
            </div>
    </div>
    <div class='panel-body'>
        @include('medicine.p_index')
    </div>
</div>
@stop
