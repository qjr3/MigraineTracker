@extends('master')


@section('style')
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
@stop


@section('header')

@stop


@section('content')
<div class='container'>
        <div class="row">
            <div class="col-sm-12 h3">{{ $journal->name }}</div>
        </div>
        <div class='row'>
            <div class='col-sm-10 h4'> {{ $journal->description }}</div>
            <div class='col-sm-2'><span class="pull-right" style="margin-bottom: 15px">{!! link_to_action('JournalController@show', trans('general.go_back'), $journal->id) !!} </span></div>
        </div>

        <div class="row">
            <div class="col-md-12">
                {!! Form::model($journal, ['action' => ['JournalController@update', $journal->id], 'method' => 'PATCH']) !!}
                <div class="col-ms-12">
                    <div class="row">
                        <!-- <div class="col-md-4 pull-right">
                            <div class="form-group">
                                <script type="text/javascript"
                                        src="http://maps.google.com/maps/api/js?sensor=false"></script>
                                <article><span id="status"></span></article>
                                {!! Form::text('loc_long', null, ['id' => 'geo_long', 'disabled' => 'true']) !!}
                                {!! Form::text('loc_lat', null, ['id' => 'geo_lat', 'disabled' => 'true'] ) !!}
                                <input id="update_geo" type="button" value="Update Map Data" onClick="update_success();"/>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('Name', trans('journal.name') ,['class' => 'form-label'] ) !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', trans('journal.description') , ['class' => 'form-label']) !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        {!! Form::label('severity', trans('journal.severity'), ['class' => 'form-label']) !!}
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
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        {!! Form::label('noise_level', trans('journal.sound_level'), ['class' => 'form-label']) !!}
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
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        {!! Form::label('light_level', trans('journal.light_level'), ['class' => 'form-label']) !!}
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
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        {!! Form::label('still_suffering', trans('journal.q_suffering'), ['class' => 'form-label']) !!}
                                        {!! Form::select('still_suffering', [ '' => '', 'True' => 'true', 'False' => 'false'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('weather', trans('journal.weather') . ':', ['class' => 'form-label']) !!}
                                {!! Form::text('weather', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('triggers_id', trans('journal.trigger') . ':', ['class' => 'form-label']) !!}
                                        {!! Form::select('triggers_id[]', $triggers, $journal->triggers->lists('id')->toArray(), ['id' => 'trigger_list', 'class' => 'form-control', 'multiple']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('medicines_id', trans('journal.medicine') . ':', ['class' => 'form-label']) !!}
                                        {!! Form::select('medicines_id[]', $medicines, $journal->medicines->lists('id')->toArray(), ['id' => 'medicine_list', 'class' => 'form-control', 'multiple']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('start_time', trans('journal.start_time'), ['class' => 'form-label']) !!}
                                        {!! Form::text('start_time', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('end_time', trans('journal.stop_time'), ['class' => 'form-label']) !!}
                                        {!! Form::text('end_time', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('has_aura', trans('journal.q_aura'), ['class' => 'form-label']) !!}
                                        {!! Form::select('has_aura', [ '' => '', 'true' => trans('general.yes'), 'false' => trans('general.no')], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('aura_description', trans('journal.aura') . '&nbsp;' . trans('general.description'), ['class' => 'form-label']) !!}
                                        {!! Form::text('aura_description', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('has_nausea', trans('journal.q_nausea'), ['class' => 'form-label']) !!}
                                        {!! Form::select('has_nausea',  [ '' => '', 'true' => trans('general.yes'), 'false' => trans('general.no')], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('has_vomitted', trans('journal.q_vomitted'), ['class' => 'form-label']) !!}
                                        {!! Form::select('has_vomitted',  [ '' => '', 'true' => trans('general.yes'), 'false' => trans('general.no')], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('has_light_sensativity', trans('journal.q_light_sensativity'), ['class' => 'form-label']) !!}
                                        {!! Form::select('has_light_sensativity',  [ '' => '', 'true' => trans('general.yes'), 'false' => trans('general.no')], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('has_sound_sensativity', trans('journal.sound_sensative'), ['class' => 'form-label']) !!}
                                        {!! Form::select('has_sound_sensativity',  [ '' => '', 'true' => trans('general.yes'), 'false' => trans('general.no')], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('has_disrupted', trans('journal.q_disrupted'), ['class' => 'form-label']) !!}
                                        {!! Form::select('has_disrupted',  [ '' => '', 'true' => trans('general.yes'), 'false' => trans('general.no')], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('missed_workschool', trans('journal.q_missed_schoolwork'), ['class' => 'form-label']) !!}
                                        {!! Form::select('missed_workschool',  [ '' => '', 'true' => trans('general.yes'), 'false' => trans('general.no')], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('missed_routines', trans('journal.q_missed_other'), ['class' => 'form-label']) !!}
                                        {!! Form::select('missed_routines',  [ '' => '', 'true' => trans('general.yes'), 'false' => trans('general.no')], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('social_plans', trans('journal.q_missed_social'), ['class' => 'form-label']) !!}
                                {!! Form::text('social_plans', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('activities', trans('journal.q_missed_other'), ['class' => 'form-label']) !!}
                                {!! Form::text('activities', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">

                            <div class='form-group'>
                                {!! Form::submit(trans('general.submit'), ['class' => 'btn btn-block btn-lg']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
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

    <script>
        //   Courtesy of http://html5demos.com/geo
        // Yeah, I could rewrite this with jQuery....but why bother....it's functional the way it is
        function success(position) {
            var s = document.querySelector('#status');
            $('#geo_long').val(position.coords.longitude);
            $('#geo_lat').val(position.coords.latitude);
            if (s.className == 'success') {
                return;
            }
            s.className = 'success';
            var mapcanvas = document.createElement('div');
            mapcanvas.id = 'mapcanvas';
            mapcanvas.style.height = '400px';
            mapcanvas.style.width = '560px';
            document.querySelector('article').appendChild(mapcanvas);

            var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            var myOptions = {
                zoom: 15,
                center: latlng,
                mapTypeControl: false,
                navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                title: "You are here! (at least within a " + position.coords.accuracy + " meter radius)"
            });
        }

        function error(msg) {
            var s = document.querySelector('#status');
            s.innerHTML = typeof msg == 'string' ? msg : "failed";
            s.className = 'fail';
        }

        position.coords.latitude = {!! $journal->loc_lat !!} ;
        position.coords.longitude = {!! $journal->loc_long !!} ; // How do I do this.....first: sleep...second, caffeine, and finally rethink the problem and do research

        success(position);

        function update_success() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(success, error);
            } else {
                error('not supported');
            }
        }
    </script>

@stop