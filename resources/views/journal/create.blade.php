@extends('master')

@section('style')
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
@stop


@section('header')

@stop


@section('content')
    <div class="row">
        <div class="col-md-6">
        {!! Form::open(['action' =>'JournalController@store', 'method' => 'post'])  !!}
            <div class="form-group">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('journal.name') ]) !!}
            </div>
            <div class="form-group">
                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('journal.description') ]) !!}
            </div>
            <div class="form-group">
              
                <span id='geo_map'>{!! trans('journal.loading_map') !!}</span>
                {!! Form::hidden('loc_long', '0.0', ['id' => 'geo_long']) !!}
                {!! Form::hidden('loc_lat', '0.0', ['id' => 'geo_lat']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('severity', trans('journal.severity'), ['class' => 'form-label']) !!}
                {!! Form::select('severity',
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
                        '10' => '10',  
                    ],
                    null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <!-- {!! Form::label('weather', 'Weather:', ['class' => 'form-label']) !!} -->
                {!! Form::text('weather', null, ['class' => 'form-control', 'placeholder' => trans('journal.weather') ]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('sound_level', trans('journal.sound_level'), ['class' => 'form-label']) !!}
                {!! Form::select('sound_level',
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
                {!! Form::label('light_level', trans('journal.light_level'), ['class' => 'form-label']) !!}
                {!! Form::select('light_level',
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

            @if(!$triggers->isEmpty())
            <div class="form-group">
                {!! Form::label('triggers_id', trans('journal.triggers'), ['class' => 'form-label']) !!}
                {!! Form::select('triggers_id[]', $triggers, 'name', ['id' => 'trigger_list', 'class' => 'form-control', 'multiple']) !!}
            </div>

            @else

            <p>Do Trigger add here.</p>
            <!-- Link to action, add trigger....return here -->
            <!-- on return remember state of form -->
            <!-- alternatively, use jquery/ajax to add the new trigger on client side, refresh this place holder. -->
            @endif


            @if(!$medicines->isEmpty())
            <div class="form-group">
                {!! Form::label('medicines_id', trans('journal.medicines'), ['class' => 'form-label']) !!}
                {!! Form::select('medicines_id[]', $medicines, 'name', ['id' => 'medicine_list', 'class' => 'form-control', 'multiple']) !!}
            </div>
            @else
                <p>Do Medicine add here</p>
                <!-- See triggers note -->
            @endif

            <div class="form-group">
                {!! Form::label('still_suffering', trans('journal.still_suffering'), ['class' => 'form-label']) !!}
                {!! Form::select('still_suffering', [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('start_time', null, ['class' => 'form-control', 'disabled' => 'true', 'placeholder' => trans('journal.start_time')]) !!}
            </div>
            <div class="form-group">
                {!! Form::text('end_time', null , ['class' => 'form-control', 'disabled' => 'true', 'placeholder' => trans('journal.end_time')]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('has_aura', 'Are you experiencing any auras?', ['class' => 'form-label']) !!}
                {!! Form::select('has_aura', [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::textarea('aura_description', null, ['class' => 'form-control', 'placeholder' => 'Description of Aura']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('has_nausea', 'Are you nauseous?', ['class' => 'form-label']) !!}
                {!! Form::select('has_nausea',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('has_vomitted', 'Have you vomitted?', ['class' => 'form-label']) !!}
                {!! Form::select('has_vomitted',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('has_light_sensativity', 'Are you experiencing sensativity to light?', ['class' => 'form-label']) !!}
                {!! Form::select('has_light_sensativity',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('has_sound_sensativity', 'Are you experiencing sensativity to sounds?', ['class' => 'form-label']) !!}
                {!! Form::select('has_sound_sensativity',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('has_disrupted', 'Are you being disrupted?', ['class' => 'form-label']) !!}
                {!! Form::select('has_disrupted',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('missed_workschool', 'Did you miss work or school?', ['class' => 'form-label']) !!}
                {!! Form::select('missed_workschool',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('missed_routines', 'Have you missed other routines?', ['class' => 'form-label']) !!}
                {!! Form::select('missed_routines',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('social_plans', 'Social Plans:', ['class' => 'form-label']) !!}
                {!! Form::text('social_plans', null, ['class' => 'form-control', 'disabled' => 'true', 'placeholder' => 'WiP']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('activities', 'Activities:', ['class' => 'form-label']) !!}
                {!! Form::text('activities', null, ['class' => 'form-control', 'disabled' => 'true', 'placeholder' => 'WiP']) !!}
            </div>
            <div class='form-group'>
                {!! Form::submit('Submit') !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop


@section('footer')
    <script type="text/javascript">
        $('#trigger_list').select2({
            placeholder: "Select Triggers"
        });
        $('#medicine_list').select2({
            placeholder: "Select Medicines"
        });
    </script>
@stop