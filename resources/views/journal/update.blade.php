@extends('master')


@section('style')
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
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
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <article><span id="status"></span></article>
        {!! Form::text('loc_long', null, ['id' => 'geo_long', 'disabled' => 'true']) !!}
        {!! Form::text('loc_lat', null, ['id' => 'geo_lat', 'disabled' => 'true'] ) !!}
        <input id="update_geo" type="button" value="Update Map Data" onClick="update_success();" />
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
        {!! Form::label('has_vomitted', 'Have you vomited?', ['class' => 'form-label']) !!}
        {!! Form::select('has_vomitted',  [ '' => '', 'true' => 'Yes', 'false' => 'False'], null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('has_light_sensativity', 'Are you experiencing sensitivity to light?', ['class' => 'form-label']) !!}
        {!! Form::select('has_light_sensativity',  [ '' => '', 'true' => 'Yes', 'false' => 'False'], null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('has_sound_sensativity', 'Are you experiencing sensitivity to sounds?', ['class' => 'form-label']) !!}
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

position.coords.latitude = {!! $journal->loc_lat !!} ;
position.coords.longitude = {!! $journal->loc_long !!} ; // How do I do this.....first: sleep...second, caffeine, and finally rethink the problem and do research
 
success(position);

function update_success()
{
    if (navigator.geolocation) { navigator.geolocation.getCurrentPosition(success, error);} else { error('not supported'); }
}
</script>

@stop