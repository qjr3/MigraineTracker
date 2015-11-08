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
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Entry Name' ]) !!}
            </div>
            <div class="form-group">
                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Entry Description' ]) !!}
            </div>
            <div class="form-group">
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                <article><span id="status"></span></article>
                {!! Form::hidden('loc_long', null, ['id' => 'geo_long']) !!}
                {!! Form::hidden('loc_lat', null, ['id' => 'geo_lat']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('severity', 'Severity', ['class' => 'form-label']) !!}
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
                {!! Form::text('weather', null, ['class' => 'form-control', 'placeholder' => 'Weather' ]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('sound_level', 'Sound Level', ['class' => 'form-label']) !!}
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
                {!! Form::label('light_level', 'Light Level', ['class' => 'form-label']) !!}
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
            @unless($common_triggers->isEmpty())
            <div class="form-group">
                {!! Form::label('common_triggers_id', 'Common Triggers', ['class' => 'form-label']) !!}
                {!! Form::select('common_triggers_id[]', $common_triggers, 'name', ['id' => 'common_triggers_list', 'class' => 'form-control', 'multiple']) !!}
            </div>
            @endunless
            
            @unless($triggers->isEmpty())
            <div class="form-group">
                {!! Form::label('triggers_id', 'Triggers', ['class' => 'form-label']) !!}
                {!! Form::select('triggers_id[]', $triggers, 'name', ['id' => 'trigger_list', 'class' => 'form-control', 'multiple']) !!}
            </div>
            @endunless
            
            <p>Do Trigger add here.</p>
            <!-- Link to action, add trigger....return here -->
            <!-- on return remember state of form -->
            <!-- alternatively, use jquery/ajax to add the new trigger on client side, refresh this place holder. -->
            
            @unless($medicines->isEmpty())
            <div class="form-group">
                {!! Form::label('medicines_id', 'Medications', ['class' => 'form-label']) !!}
                {!! Form::select('medicines_id[]', $medicines, 'name', ['id' => 'medicine_list', 'class' => 'form-control', 'multiple']) !!}
            </div>
            @endunless
            
            <p>Do Medicine add here</p>
            <!-- See triggers note -->

            <div class="form-group">
                {!! Form::label('still_suffering', 'Currently Suffering?', ['class' => 'form-label']) !!}
                {!! Form::select('still_suffering', [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('start_time', null, ['class' => 'form-control', 'disabled' => 'true', 'placeholder' => 'Start Time']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('end_time', null , ['class' => 'form-control', 'disabled' => 'true', 'placeholder' => 'End Time']) !!}
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
                {!! Form::label('has_vomitted', 'Have you vomited?', ['class' => 'form-label']) !!}
                {!! Form::select('has_vomitted',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('has_light_sensativity', 'Are you experiencing sensitivity to light?', ['class' => 'form-label']) !!}
                {!! Form::select('has_light_sensativity',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('has_sound_sensativity', 'Are you experiencing sensitivity to sounds?', ['class' => 'form-label']) !!}
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
            <!-- <div class="form-group">
                {!! Form::label('social_plans', 'Social Plans:', ['class' => 'form-label']) !!}
                {!! Form::text('social_plans', null, ['class' => 'form-control', 'disabled' => 'true', 'placeholder' => 'WiP']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('activities', 'Activities:', ['class' => 'form-label']) !!}
                {!! Form::text('activities', null, ['class' => 'form-control', 'disabled' => 'true', 'placeholder' => 'WiP']) !!}
            </div> -->
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
        
        $('#common_triggers_list').select2({
            placeholder: "Select CommonTriggers"
        });
    </script>
    
<script>
 //   Courtesy of http://html5demos.com/geo
 // Yeah, I could rewrite this with jQuery....but why bother....it's functional the way it is
function success(position){
    var s = document.querySelector('#status');
    $('#geo_long').val(position.coords.longitude);
    $('#geo_lat').val(position.coords.latitude);
    if (s.className == 'success') { return;}
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
        title:"You are here! (at least within a "+position.coords.accuracy+" meter radius)"
    });
}

function error(msg) {
    var s = document.querySelector('#status');
    s.innerHTML = typeof msg == 'string' ? msg : "failed";
    s.className = 'fail';
}
if (navigator.geolocation) { navigator.geolocation.getCurrentPosition(success, error);} else { error('not supported'); }

</script>
@stop