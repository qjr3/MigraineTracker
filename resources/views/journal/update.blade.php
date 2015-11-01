@extends('master')


@section('style')
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
@stop

@section('header')

@stop


@section('content')
{!! Form::model($journal, ['action' => ['JournalController@update', $journal->id], 'method' => 'PATCH']) !!}
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
            '' => '',
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
    {!! Form::label('weather', 'Weather:', ['class' => 'form-label']) !!}
    {!! Form::text('weather', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('noise_level', 'Noise Level:', ['class' => 'form-label']) !!}
    {!! Form::select('noise_level',
        [
            '' => '',
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
    {!! Form::select('triggers_id[]', $triggers, $journal->triggers->lists('id')->toArray(), ['id' => 'trigger_list', 'class' => 'form-control', 'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::label('medicines_id', 'Medicines:', ['class' => 'form-label']) !!}
    {!! Form::select('medicines_id[]', $medicines, $journal->medicines->lists('id')->toArray(), ['id' => 'medicine_list', 'class' => 'form-control', 'multiple']) !!}
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
    {!! Form::label('has_aura', 'Are you experiencing any auras?', ['class' => 'form-label']) !!}
    {!! Form::select('has_aura', [ '' => '', 'true' => 'Yes', 'false' => 'False'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('aura_description', 'aura_description:', ['class' => 'form-label']) !!}
    {!! Form::text('aura_description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('has_nausea', 'Are you nauseous?', ['class' => 'form-label']) !!}
    {!! Form::select('has_nausea',  [ '' => '', 'true' => 'Yes', 'false' => 'False'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('has_vomitted', 'Have you vomitted?', ['class' => 'form-label']) !!}
    {!! Form::select('has_vomitted',  [ '' => '', 'true' => 'Yes', 'false' => 'False'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('has_light_sensativity', 'Are you experiencing sensativity to light?', ['class' => 'form-label']) !!}
    {!! Form::select('has_light_sensativity',  [ '' => '', 'true' => 'Yes', 'false' => 'False'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('has_sound_sensativity', 'Are you experiencing sensativity to sounds?', ['class' => 'form-label']) !!}
    {!! Form::select('has_sound_sensativity',  [ '' => '', 'true' => 'Yes', 'false' => 'False'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('has_disrupted', 'Are you being disrupted?', ['class' => 'form-label']) !!}
    {!! Form::select('has_disrupted',  [ '' => '', 'true' => 'Yes', 'false' => 'False'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('missed_workschool', 'Did you miss work or school?', ['class' => 'form-label']) !!}
    {!! Form::select('missed_workschool',  [ '' => '', 'true' => 'Yes', 'false' => 'False'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('missed_routines', 'Have you missed other routines?', ['class' => 'form-label']) !!}
    {!! Form::select('missed_routines',  [ '' => '', 'true' => 'Yes', 'false' => 'False'], null, ['class' => 'form-control']) !!}
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
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <script type="text/javascript">
        $('#trigger_list').select2({
            placeholder: "Select Triggers"
        });
        $('#medicine_list').select2({
            placeholder: "Select Medicines"
        });
    </script>

@stop