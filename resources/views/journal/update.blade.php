@extends('master')

@section('title')

@stop

@section('header')

@stop


@section('content')
{!! Form::open(['action' =>'JournalController@update', 'method' => 'post']) !!}
<div class="form-group">
    {!! Form::label('Name', 'Name',['class' => 'form-label'] ) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'form-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('location', 'Location', ['class' => 'form-label']) !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('severity', 'Severity:', ['class' => 'form-label']) !!}
    {!! Form::select('severity',
        [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',  
        ],
        null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('location', 'Location:', ['class' => 'form-label']) !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('weather', 'Weather:', ['class' => 'form-label']) !!}
    {!! Form::text('weather', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('noise_level', 'Noise Level:', ['class' => 'form-label']) !!}
    {!! Form::select('noise_level',
        [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10'  
        ],
        null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('light_level', 'Light Level:', ['class' => 'form-label']) !!}
    {!! Form::select('light_level',
        [
            '' => '', // No response response
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10'  
        ],
         null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('triggers_id', 'Triggers:', ['class' => 'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('medicines_id', 'Medicines:', ['class' => 'form-label']) !!}
    {!! Form::text('medicines_id', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('still_suffering', 'still_suffering:', ['class' => 'form-label']) !!}
    {!! Form::select('still_suffering', [ '' => '', 'True' => 'true', 'False' => 'false'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('start_time', 'Start Time:', ['class' => 'form-label']) !!}
    {!! Form::text('start_time', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('end_time', 'End Time:', ['class' => 'form-label']) !!}
    {!! Form::text('end_time', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('has_aura', 'Has Aura:', ['class' => 'form-label']) !!}
    {!! Form::select('has_aura', [ '' => '', 'true' => 'True', 'false' => 'False'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('aura_description', 'aura_description:', ['class' => 'form-label']) !!}
    {!! Form::text('aura_description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('has_nausea', 'Nauseous:', ['class' => 'form-label']) !!}
    {!! Form::select('has_nausea',  [ '' => '', 'true' => 'True', 'false' => 'False'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('has_vomitted', 'Vomitted:', ['class' => 'form-label']) !!}
    {!! Form::select('has_vomitted',  [ '' => '', 'true' => 'True', 'false' => 'False'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('has_light_sensativity', 'Light Sensative?', ['class' => 'form-label']) !!}
    {!! Form::select('has_light_sensativity',  [ '' => '', 'true' => 'True', 'false' => 'False'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('has_sound_sensativity', 'Sound Sensative:', ['class' => 'form-label']) !!}
    {!! Form::select('has_sound_sensativity',  [ '' => '', 'true' => 'True', 'false' => 'False'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('has_disrupted', 'Been Disrupted:', ['class' => 'form-label']) !!}
    {!! Form::select('has_disrupted',  [ '' => '', 'true' => 'True', 'false' => 'False'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('missed_workschool', 'Missed Work or School?', ['class' => 'form-label']) !!}
    {!! Form::select('missed_workschool',  [ '' => '', 'true' => 'True', 'false' => 'False'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('missed_routines', 'Missed Other Routines?', ['class' => 'form-label']) !!}
    {!! Form::select('missed_routines',  [ '' => '', 'true' => 'True', 'false' => 'False'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('social_plans', 'Social Plans:', ['class' => 'form-label']) !!}
    {!! Form::text('social_plans', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('activities', 'Activities:', ['class' => 'form-label']) !!}
    {!! Form::text('activities', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
</div>
<div class='form-group'>
    {!! Form::submit('Submit') !!}
</div>
{!! Form::close() !!}
@stop


@section('footer')

@stop