@extends('master')


@section('style')
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
@stop


@section('header')

@stop


@section('content')

                {!! Form::model($journal, ['action' => ['JournalController@update', $journal->id], 'method' => 'PATCH']) !!}
                    <div class="form-group">
                        {!! Form::label('Name', 'Entry Name' ,['class' => 'form-label'] ) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Entry Description' , ['class' => 'form-label']) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('has_aura', 'Experiencing Aura?', ['class' => 'form-label']) !!}
                        {!! Form::select('has_aura', [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('aura_description', 'Aura Description', ['class' => 'form-label']) !!}
                        {!! Form::textarea('aura_description', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="row">
                        <div class="col-xs-4 form-group">
                            {!! Form::label('common_triggers_id', 'Common Triggers', ['class' => 'form-label']) !!}
                            {!! Form::select('common_triggers_id[]', $common_triggers, $journal->common_triggers->lists('id')->toArray(), ['id' => 'common_triggers_list', 'class' => 'form-control', 'multiple']) !!}
                        </div>
                        <div class="col-xs-4 form-group">
                            {!! Form::label('triggers_id', 'Triggers', ['class' => 'form-label']) !!}
                            {!! Form::select('triggers_id[]', $triggers, $journal->triggers->lists('id')->toArray(), ['id' => 'trigger_list', 'class' => 'form-control', 'multiple']) !!}
                        </div>
                        <div class="col-xs-4 form-group">
                            {!! Form::label('medicines_id', 'Medications' . ':', ['class' => 'form-label']) !!}
                            {!! Form::select('medicines_id[]', $medicines, $journal->medicines->lists('id')->toArray(), ['id' => 'medicine_list', 'class' => 'form-control', 'multiple']) !!}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='form-group col-xs-4'>
                            <div class='row'>
                                <div class='col-xs-6'>{!! Form::label('location', 'Location', ['class' => 'form-label']) !!}</div>
                                <div class='col-xs-6'><span id='get_location' class='glyphicon glyphicon-screenshot'></span></div>
                            </div>
                            {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'City, ST'] ) !!}
                        </div>
                        <div class='form-group col-xs-4'>
                            {!! Form::label('weather_pressure', 'Barometric Pressure', ['class' => 'form-label']) !!}
                            {!! Form::text('weather_pressure', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class='form-group col-xs-4'>
                            {!! Form::label('weather_temperature', 'Temperature', ['class' => 'form-label']) !!}
                            {!! Form::text('weather_temperature', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                {!! Form::label('still_suffering', 'Still Suffering?', ['class' => 'form-label']) !!}
                                {!! Form::select('still_suffering', [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('severity', 'Severity', ['class' => 'form-label']) !!}
                                {!! Form::select('severity', ['','0', '1', '2', '3','4','5','6','7','8','9'], null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                {!! Form::label('sound_level', 'Sound Level', ['class' => 'form-label']) !!}
                                {!! Form::select('sound_level', ['','0', '1', '2', '3','4','5','6','7','8','9'], null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('light_level', 'Light Level', ['class' => 'form-label']) !!}
                                {!! Form::select('light_level', ['','0', '1', '2', '3','4','5','6','7','8','9'], null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                {!! Form::label('start_time', 'Start Time', ['class' => 'form-label']) !!}
                                {!! Form::input('datetime-local', 'start_time', $journal->start_time, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('end_time', 'End Time', ['class' => 'form-label']) !!}
                                {!! Form::input('datetime-local', 'end_time', $journal->end_time , ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group row">
                                <div class='col-xs-6'>{!! Form::label('has_nausea', 'Nauseous?', ['class' => 'form-label']) !!}</div>
                                <div class='col-xs-6'>{!! Form::select('has_nausea',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}</div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group row">
                                <div class='col-xs-6'>{!! Form::label('has_vomited', 'Vomited?', ['class' => 'form-label']) !!}</div>
                                <div class='col-xs-6'>{!! Form::select('has_vomited',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-xs-6'>
                            <div class="form-group row">
                                <div class='col-xs-6'>{!! Form::label('has_light_sensitivity', 'Light Sensitivity', ['class' => 'form-label']) !!}</div>
                                <div class='col-xs-6'>{!! Form::select('has_light_sensitivity',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}</div>
                            </div>
                            <div class="form-group row">
                                <div class='col-xs-6'>{!! Form::label('has_sound_sensitivity', 'Sound Sensitivity', ['class' => 'form-label']) !!}</div>
                                <div class='col-xs-6'>{!! Form::select('has_sound_sensitivity',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}</div>
                            </div>
                            <div class="form-group row">
                                <div class='col-xs-6'>{!! Form::label('has_disrupted', 'Disruptions', ['class' => 'form-label']) !!}</div>
                                <div class='col-xs-6'>{!! Form::select('has_disrupted',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}</div>
                            </div>
                            <div class="form-group row">
                                <div class='col-xs-6'>{!! Form::label('missed_workschool', 'Missed Work or School', ['class' => 'form-label']) !!}</div>
                                <div class='col-xs-6'>{!! Form::select('missed_workschool',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}</div>
                            </div>
                        </div>
                        <div class='col-xs-6'>
                            <div class="form-group row">
                                <div class='col-xs-6'>{!! Form::label('missed_routines', 'Missed Other Activities', ['class' => 'form-label']) !!}</div>
                                <div class='col-xs-6'>{!! Form::select('missed_routines',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}</div>
                            </div>
                            <div class="form-group row">
                                <div class='col-xs-6'>{!! Form::label('missed_social', 'Missed Social Events', ['class' => 'form-label']) !!}</div>
                                <div class='col-xs-6'>{!! Form::select('missed_social', [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control'])  !!}</div>
                            </div>
                            <div class="form-group row">
                                <div class='col-xs-6'>{!! Form::label('missed_personal_activity', 'Missed Other Events', ['class' => 'form-label']) !!}</div>
                                <div class='col-xs-6'>{!! Form::select('missed_personal_activity', [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control'])  !!}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-xs-12'>
                            <div class='form-group row'>
                                <div class='col-xs-8'>{!! Form::submit('Submit', ['class' => 'btn btn-block btn-primary btn-default']) !!}</div>
                                <div class='col-xs-4'><span class="pull-right btn btn-warning" style="margin-bottom: 15px">{!! link_to_action('JournalController@show', 'Cancel', $journal->id) !!}</span></div>
                            </div>
                    </div>
                </div>
                {!! Form::close() !!}
@stop


@section('footer')

    <script type="text/javascript">
        $(document).ready(function(){
            $('#trigger_list').select2({
                placeholder: "Select Triggers"
            });
            $('#medicine_list').select2({
                placeholder: "Select Medicines"
            });

            $('#common_triggers_list').select2({
                placeholder: "Select CommonTriggers"
            });
            
            $('#get_location').click(get_location);
        });
        
        var get_location = function(){
            
        };
    </script>

@stop