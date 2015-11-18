@extends('master')

@section('style')
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="/js/jquery.ajax-cross-origin-min.js"></script>
@stop


@section('header')

@stop


@section('content')
    <div class='row'>
        <h3 class='col-xs-12'>Add New Journal</h3>
    </div>

    <div class="row">
        {!! Form::open(['action' =>'JournalController@store', 'method' => 'post'])  !!}
        <div class="form-group col-xs-8">
            {!! Form::label('name', 'Journal Name', ['class' => 'form-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Entry Name' ]) !!}
        </div>
        <div class="form-group col-xs-4">
            {!! Form::label('severity', 'Severity', ['class' => 'form-label']) !!}
            {!! Form::select('severity', [ '', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10' ], null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class='row'>
        <div class="form-group col-xs-12">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Entry Description' ]) !!}
        </div>
    </div>
    <div class='row'>
        <div class='col-xs-5 form-group'>
            {!! Form::text('location_city', null, ['class'=>'form-control', 'placeholder'=>'City']) !!}
        </div>
        <div class='col-xs-3 form-group'>
            {!! Form::text('location_state', null, ['class'=>'form-control', 'placeholder'=>'State']) !!}
        </div>
        <div class='col-xs-3 form-group'>
            {!! Form::text('location_zip', null, ['class'=>'form-control', 'placeholder'=>'Zip Code']) !!}
        </div>
        <div class='col-xs-1 form-group'>
            <span class='glyphicon glyphicon-screenshot btn btn-sm' id='use_location'></span>
        </div>
    </div>
    <div class='row'>
        <div class='col-xs-6 form-group'>
            {!! Form::text('weather_temperature', '', ['class' => 'form-control', 'placeholder' => 'Temperature', 'id'=>'weather_temperature' ]) !!}
        </div>
        <div class='col-xs-6 form-group'>
            {!! Form::text('weather_pressure', '', ['class' => 'form-control', 'placeholder' => 'Barometric Pressure', 'id'=>'weather_pressure' ]) !!}
        </div>
    </div>
    <div class='row'>
        <div class="form-group col-xs-6">
            {!! Form::label('sound_level', 'Sound Level', ['class' => 'form-label']) !!}
            {!! Form::select('sound_level', [ '', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10' ], null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-xs-6">
            {!! Form::label('light_level', 'Light Level', ['class' => 'form-label']) !!}
            {!! Form::select('light_level', [ '', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10' ], null, ['class' => 'form-control']) !!}
        </div>
    </div>
<div class='row'>
        <div class="form-group col-xs-12">
            {!! Form::label('common_triggers_id', 'Common Triggers', ['class' => 'form-label']) !!}
            {!! Form::select('common_triggers_id[]', $common_triggers, 'name', ['id' => 'common_triggers_list', 'class' => 'form-control', 'multiple']) !!}
        </div>
</div>
    <div class='row'>

        <div class="form-group col-xs-4">
            {!! Form::label('triggers_id', 'Triggers', ['class' => 'form-label']) !!}
            {!! Form::select('triggers_id[]', $triggers, 'name', ['id' => 'trigger_list', 'class' => 'form-control', 'multiple']) !!}
        </div>
        <div class='form-group col-xs-2'>
            <div class=''>&nbsp;</div>
            @include('trigger.p_add_button')
        </div>

        <div class="form-group col-xs-4">
            {!! Form::label('medicines_id', 'Medications', ['class' => 'form-label']) !!}
            {!! Form::select('medicines_id[]', $medicines, 'name', ['id' => 'medicine_list', 'class' => 'form-control', 'multiple']) !!}
        </div>
        <div class='form-group col-xs-2'>
            <div class=''>&nbsp;</div>
            @include('medicine.p_add_button')
        </div>
    </div>

    <div class='row'>
        <div class="form-group col-xs-6">
            {!! Form::label('start_time', 'Started', ['class' => 'form-label']) !!}
            {!! Form::input('datetime-local', 'start_time', '', ['class' => 'form-control', 'autocomplete' => 'true']) !!}
        </div>
        <div class="form-group col-xs-6">
            {!! Form::label('end_time', 'Ended', ['class' => 'form-label']) !!}
            {!! Form::input('datetime-local', 'end_time', '', ['class' => 'form-control', 'autocomplete' => 'true']) !!}
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
    <div class='form-group'>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>

    {{--
    Make sure these exist in $request so we can set them manually in controller before model filling
    {!! Form::hidden('weather_pressure') !!}
    {!! Form::hidden('weather_temperature') !!}
    --}}
    {!! Form::close() !!}
    
    {!! Form::open( array('action' => 'TriggerController@store', 'class' => 'add-obj', 'id' => 'add-trigger')) !!}
    @include('trigger.p_add_modal')
    {!! Form::close() !!}
    {!! Form::open( array('action' => 'MedicineController@store', 'class' => 'add-obj', 'id' => 'add-medicine')) !!}
    @include('medicine.p_add_modal')
    {!! Form::close() !!}
@stop


@section('footer')
    <script type="text/javascript">
        $('#trigger_list').select2({
            placeholder: "Select Triggers",
            ajax: {
                url: "/api/triggers",
                dataType: 'json',
                type: "GET",
                data: function (params) {
                    return {
                        name: params.term
                    };
                }, processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });
        $('#medicine_list').select2({
            placeholder: "Select Medicines",
            ajax: {
                url: "/api/medicines",
                dataType: 'json',
                type: "GET",
                data: function (params) {
                    return {
                        name: params.term
                    };
                }, processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });

        $('#common_triggers_list').select2({
            placeholder: "Select CommonTriggers"
        });

        $(".add-obj").on("submit", function(e)  {
            e.preventDefault();
            var form = $(this);
            console.log(form.attr('id'));
            var action = form.attr("action");
            $.ajax({
                type: "POST",
                url: action,
                data: $(this).closest('form').serialize(),
                cache: false,
                success: function (data) {
                    $('#' + form.attr('id'))[0].reset();
                    $(".modal").modal('hide');
                    return data;
                },
                error: function (data) {
                    // Error...
                    var errors = data.responseJSON;

                    console.log(errors);
                }
            });
        });
    </script>

    <script>
        // GEO DATA JSON SAMPLE
        //{
        //   "results" : [
        //      {
        //         "address_components" : [
        //            {
        //               "long_name" : "1600",
        //               "short_name" : "1600",
        //               "types" : [ "street_number" ]
        //            },
        //            {
        //               "long_name" : "Amphitheatre Pkwy",
        //               "short_name" : "Amphitheatre Pkwy",
        //               "types" : [ "route" ]
        //            },
        //            {
        //               "long_name" : "Mountain View",
        //               "short_name" : "Mountain View",
        //               "types" : [ "locality", "political" ]
        //            },
        //            {
        //               "long_name" : "Santa Clara County",
        //               "short_name" : "Santa Clara County",
        //               "types" : [ "administrative_area_level_2", "political" ]
        //            },
        //            {
        //               "long_name" : "California",
        //               "short_name" : "CA",
        //               "types" : [ "administrative_area_level_1", "political" ]
        //            },
        //            {
        //               "long_name" : "United States",
        //               "short_name" : "US",
        //               "types" : [ "country", "political" ]
        //            },
        //            {
        //               "long_name" : "94043",
        //               "short_name" : "94043",
        //               "types" : [ "postal_code" ]
        //            }
        //         ],
        //         "formatted_address" : "1600 Amphitheatre Parkway, Mountain View, CA 94043, USA",
        //         "geometry" : {
        //            "location" : {
        //               "lat" : 37.4224764,
        //               "lng" : -122.0842499
        //            },
        //            "location_type" : "ROOFTOP",
        //            "viewport" : {
        //               "northeast" : {
        //                  "lat" : 37.4238253802915,
        //                  "lng" : -122.0829009197085
        //               },
        //               "southwest" : {
        //                  "lat" : 37.4211274197085,
        //                  "lng" : -122.0855988802915
        //               }
        //            }
        //         },
        //         "place_id" : "ChIJ2eUgeAK6j4ARbn5u_wAGqWA",
        //         "types" : [ "street_address" ]
        //      }
        //   ],
        //   "status" : "OK"
        //}

        var options = {
            enableHighAccuracy: true,
            timeout: 1000,
            maximumAge: 0
        };

        $().ready(function(){
            setLocation();
            getWeather();
            $('#use_location').click(setLocation);
            $('#get_weather').click(getWeather);

            navigator.geolocation.getCurrentPosition(success,error,options);
        });

        function setLocation()
        {
//        $('#longitude').val(longitude);
//        $('#latitude').val(latitude);
//        $('#house_number').val(housenumber);
//        $('#street_name').val(streetname);
//        $('#town').val(town);
            $('#city').val(city);
//        $('#county').val(county);
            $('#state').val(state);
            $('#zipcode').val(zipcode);
//        $('#country').val(country);
        }

        function parseLocation(latitude,longitude){
            var request = new XMLHttpRequest();

            var method = 'GET';
            var url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='+latitude+','+longitude+'&sensor=true';
            var async = true;

            request.open(method, url, async);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var data = JSON.parse(request.responseText);
                    housenumber = data.results[0].address_components[0].long_name;
                    streetname = data.results[0].address_components[1].long_name;
                    town = data.results[0].address_components[2].long_name;
                    city = data.results[0].address_components[3].long_name;
                    county = data.results[0].address_components[4].long_name;
                    state = data.results[0].address_components[5].short_name;
                    country = data.results[0].address_components[6].short_name;
                    zipcode = data.results[0].address_components[7].long_name;
                }
            };
            request.send();
        }

        var success = function(position){
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
            parseLocation(latitude,longitude);
        };

        var error = function(error){
            var errorMessage = 'Unknown error';
            switch(error.code) {
                case 1:
                    errorMessage = 'Permission denied';
                    break;
                case 2:
                    errorMessage = 'Position unavailable';
                    break;
                case 3:
                    errorMessage = 'Timeout';
                    break;
            }
            alert(errorMessage);
        };



        // Weather JSON Packet Sample
        //{
        //   "coord":{
        //      "lon":-122.09,
        //      "lat":37.39
        //   },
        //   "sys":{
        //      "type":3,
        //      "id":168940,
        //      "message":0.0297,
        //      "country":"US",
        //      "sunrise":1427723751,
        //      "sunset":1427768967
        //   },
        //   "weather":[
        //      {
        //         "id":800,
        //         "main":"Clear",
        //         "description":"Sky is Clear",
        //         "icon":"01n"
        //      }
        //   ],
        //   "base":"stations",
        //   "main":{
        //      "temp":285.68,
        //      "humidity":74,
        //      "pressure":1016.8,
        //      "temp_min":284.82,
        //      "temp_max":286.48
        //   },
        //   "wind":{
        //      "speed":0.96,
        //      "deg":285.001
        //   },
        //   "clouds":{
        //      "all":0
        //   },
        //   "dt":1427700245,
        //   "id":0,
        //   "name":"Mountain View",
        //   "cod":200
        //}

        var getWeather = function()
        {
            var request = new XMLHttpRequest();

            var method = 'GET';

            // if city/state given

            // if zip given

            // if using current location

            var url = 'http://api.openweathermap.org/data/2.5/weather?zip=' + zipcode + ','+ country + '&appid=0fb5360e492d477486818bdc1d8f752b'
            var async = true;
            request.open(method, url, async);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var data = JSON.parse(request.responseText);

                    $('#weather_pressure').val(data.main.pressure);
                    $('#weather_temperature').val(data.main.temp);
                }
            };
            request.send();
        };
    </script>

@stop

@section('style')
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="/js/jquery.ajax-cross-origin-min.js"></script>
@stop


@section('header')

@stop


@section('content')
    <div class='row'>
        <h3 class='col-xs-12'>Add New Journal</h3>
    </div>

    <div class="row">
        {!! Form::open(['action' =>'JournalController@store', 'method' => 'post'])  !!}
        <div class="form-group col-xs-8">
            {!! Form::label('name', 'Journal Name', ['class' => 'form-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Entry Name' ]) !!}
        </div>
        <div class="form-group col-xs-4">
            {!! Form::label('severity', 'Severity', ['class' => 'form-label']) !!}
            {!! Form::select('severity', [ '', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10' ], null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class='row'>
        <div class="form-group col-xs-12">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Entry Description' ]) !!}
        </div>
    </div>
    <div class='row'>
        <div class='col-xs-5 form-group'>
            {!! Form::text('location_city', null, ['class'=>'form-control', 'placeholder'=>'City']) !!}
        </div>
        <div class='col-xs-3 form-group'>
            {!! Form::text('location_state', null, ['class'=>'form-control', 'placeholder'=>'State']) !!}
        </div>
        <div class='col-xs-3 form-group'>
            {!! Form::text('location_zip', null, ['class'=>'form-control', 'placeholder'=>'Zip Code']) !!}
        </div>
        <div class='col-xs-1 form-group'>
            <span class='glyphicon glyphicon-screenshot btn btn-sm' id='use_location'></span>
        </div>
    </div>
    <div class='row'>
        <div class='col-xs-6 form-group'>
            {!! Form::text('weather_temperature', '', ['class' => 'form-control', 'placeholder' => 'Temperature', 'id'=>'weather_temperature' ]) !!}
        </div>
        <div class='col-xs-6 form-group'>
            {!! Form::text('weather_pressure', '', ['class' => 'form-control', 'placeholder' => 'Barometric Pressure', 'id'=>'weather_pressure' ]) !!}
        </div>
    </div>
    <div class='row'>
        <div class="form-group col-xs-6">
            {!! Form::label('sound_level', 'Sound Level', ['class' => 'form-label']) !!}
            {!! Form::select('sound_level', [ '', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10' ], null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-xs-6">
            {!! Form::label('light_level', 'Light Level', ['class' => 'form-label']) !!}
            {!! Form::select('light_level', [ '', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10' ], null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class='row'>
        <div class="form-group col-xs-4">
            {!! Form::label('common_triggers_id', 'Common Triggers', ['class' => 'form-label']) !!}
            {!! Form::select('common_triggers_id[]', $common_triggers, 'name', ['id' => 'common_triggers_list', 'class' => 'form-control', 'multiple']) !!}
        </div>

        <div class="form-group col-xs-4">
            {!! Form::label('triggers_id', 'Triggers', ['class' => 'form-label']) !!}
            {!! Form::select('triggers_id[]', $triggers, 'name', ['id' => 'trigger_list', 'class' => 'form-control', 'multiple']) !!}
        </div>

        <div class="form-group col-xs-4">
            {!! Form::label('medicines_id', 'Medications', ['class' => 'form-label']) !!}
            {!! Form::select('medicines_id[]', $medicines, 'name', ['id' => 'medicine_list', 'class' => 'form-control', 'multiple']) !!}
        </div>
    </div>

    <div class='row'>
        <div class="form-group col-xs-6">
            {!! Form::label('start_time', 'Started', ['class' => 'form-label']) !!}
            {!! Form::input('datetime-local', 'start_time', '', ['class' => 'form-control', 'autocomplete' => 'true']) !!}
        </div>
        <div class="form-group col-xs-6">
            {!! Form::label('end_time', 'Ended', ['class' => 'form-label']) !!}
            {!! Form::input('datetime-local', 'end_time', '', ['class' => 'form-control', 'autocomplete' => 'true']) !!}
        </div>
    </div>
    <div class='row'>


        <div class="form-group">
            {!! Form::label('has_aura', 'Are you experiencing any auras?', ['class' => 'form-label']) !!}
            {!! Form::select('has_aura', [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::textarea('aura_description', null, ['class' => 'form-control', 'placeholder' => 'Description of Aura']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('still_suffering', 'Currently Suffering?', ['class' => 'form-label']) !!}
            {!! Form::select('still_suffering', [ '' => '', 'true' => 'Yes', 'false' => 'No'], ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('has_nausea', 'Are you nauseous?', ['class' => 'form-label']) !!}
            {!! Form::select('has_nausea', ['' => '', 'true' => 'Yes', 'false' => 'No'], ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('has_vomited', 'Have you vomited?', ['class' => 'form-label']) !!}
            {!! Form::select('has_vomited', ['' => '', 'true' => 'Yes', 'false' => 'No'], ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('has_light_sensitivity', 'Are you experiencing sensitivity to light?', ['class' => 'form-label']) !!}
            {!! Form::select('has_light_sensitivity', ['' => '', 'true' => 'Yes', 'false' => 'No'], ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('has_sound_sensitivity', 'Are you experiencing sensitivity to sounds?', ['class' => 'form-label']) !!}
            {!! Form::select('has_sound_sensitivity', ['' => '', 'true' => 'Yes', 'false' => 'No'], ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('has_disrupted', 'Are you being disrupted?', ['class' => 'form-label']) !!}
            {!! Form::select('has_disrupted', ['' => '', 'true' => 'Yes', 'false' => 'No'], ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('missed_workschool', 'Did you miss work or school?', ['class' => 'form-label']) !!}
            {!! Form::select('missed_workschool', ['' => '', 'true' => 'Yes', 'false' => 'No'], ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('missed_routines', 'Have you missed other routines?', ['class' => 'form-label']) !!}
            {!! Form::select('missed_routines', ['' => '', 'true' => 'Yes', 'false' => 'No'], ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('social_plans', 'Social Plans:', ['class' => 'form-label']) !!}
            {!! Form::select('social_plans', ['' => '', 'true' => 'Yes', 'false' => 'No'], ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('activities', 'Activities:', ['class' => 'form-label']) !!}
            {!! Form::select('activities', ['' => '', 'true' => 'Yes', 'false' => 'No'], ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class='form-group'>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>

    {{--
    Make sure these exist in $request so we can set them manually in controller before model filling
    {!! Form::hidden('weather_pressure') !!}
    {!! Form::hidden('weather_temperature') !!}
    --}}
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

        $('#common_triggers_list').select2({
            placeholder: "Select CommonTriggers"
        });
    </script>

    <script>
        // GEO DATA JSON SAMPLE
        //{
        //   "results" : [
        //      {
        //         "address_components" : [
        //            {
        //               "long_name" : "1600",
        //               "short_name" : "1600",
        //               "types" : [ "street_number" ]
        //            },
        //            {
        //               "long_name" : "Amphitheatre Pkwy",
        //               "short_name" : "Amphitheatre Pkwy",
        //               "types" : [ "route" ]
        //            },
        //            {
        //               "long_name" : "Mountain View",
        //               "short_name" : "Mountain View",
        //               "types" : [ "locality", "political" ]
        //            },
        //            {
        //               "long_name" : "Santa Clara County",
        //               "short_name" : "Santa Clara County",
        //               "types" : [ "administrative_area_level_2", "political" ]
        //            },
        //            {
        //               "long_name" : "California",
        //               "short_name" : "CA",
        //               "types" : [ "administrative_area_level_1", "political" ]
        //            },
        //            {
        //               "long_name" : "United States",
        //               "short_name" : "US",
        //               "types" : [ "country", "political" ]
        //            },
        //            {
        //               "long_name" : "94043",
        //               "short_name" : "94043",
        //               "types" : [ "postal_code" ]
        //            }
        //         ],
        //         "formatted_address" : "1600 Amphitheatre Parkway, Mountain View, CA 94043, USA",
        //         "geometry" : {
        //            "location" : {
        //               "lat" : 37.4224764,
        //               "lng" : -122.0842499
        //            },
        //            "location_type" : "ROOFTOP",
        //            "viewport" : {
        //               "northeast" : {
        //                  "lat" : 37.4238253802915,
        //                  "lng" : -122.0829009197085
        //               },
        //               "southwest" : {
        //                  "lat" : 37.4211274197085,
        //                  "lng" : -122.0855988802915
        //               }
        //            }
        //         },
        //         "place_id" : "ChIJ2eUgeAK6j4ARbn5u_wAGqWA",
        //         "types" : [ "street_address" ]
        //      }
        //   ],
        //   "status" : "OK"
        //}

        var options = {
            enableHighAccuracy: true,
            timeout: 1000,
            maximumAge: 0
        };

        $().ready(function(){
            setLocation();
            getWeather();
            $('#use_location').click(setLocation);
            $('#get_weather').click(getWeather);

            navigator.geolocation.getCurrentPosition(success,error,options);
        });

        function setLocation()
        {
//        $('#longitude').val(longitude);
//        $('#latitude').val(latitude);
//        $('#house_number').val(housenumber);
//        $('#street_name').val(streetname);
//        $('#town').val(town);
            $('#city').val(city);
//        $('#county').val(county);
            $('#state').val(state);
            $('#zipcode').val(zipcode);
//        $('#country').val(country);
        }

        function parseLocation(latitude,longitude){
            var request = new XMLHttpRequest();

            var method = 'GET';
            var url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='+latitude+','+longitude+'&sensor=true';
            var async = true;

            request.open(method, url, async);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var data = JSON.parse(request.responseText);
                    housenumber = data.results[0].address_components[0].long_name;
                    streetname = data.results[0].address_components[1].long_name;
                    town = data.results[0].address_components[2].long_name;
                    city = data.results[0].address_components[3].long_name;
                    county = data.results[0].address_components[4].long_name;
                    state = data.results[0].address_components[5].short_name;
                    country = data.results[0].address_components[6].short_name;
                    zipcode = data.results[0].address_components[7].long_name;
                }
            };
            request.send();
        }

        var success = function(position){
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
            parseLocation(latitude,longitude);
        };

        var error = function(error){
            var errorMessage = 'Unknown error';
            switch(error.code) {
                case 1:
                    errorMessage = 'Permission denied';
                    break;
                case 2:
                    errorMessage = 'Position unavailable';
                    break;
                case 3:
                    errorMessage = 'Timeout';
                    break;
            }
            alert(errorMessage);
        };



        // Weather JSON Packet Sample
        //{
        //   "coord":{
        //      "lon":-122.09,
        //      "lat":37.39
        //   },
        //   "sys":{
        //      "type":3,
        //      "id":168940,
        //      "message":0.0297,
        //      "country":"US",
        //      "sunrise":1427723751,
        //      "sunset":1427768967
        //   },
        //   "weather":[
        //      {
        //         "id":800,
        //         "main":"Clear",
        //         "description":"Sky is Clear",
        //         "icon":"01n"
        //      }
        //   ],
        //   "base":"stations",
        //   "main":{
        //      "temp":285.68,
        //      "humidity":74,
        //      "pressure":1016.8,
        //      "temp_min":284.82,
        //      "temp_max":286.48
        //   },
        //   "wind":{
        //      "speed":0.96,
        //      "deg":285.001
        //   },
        //   "clouds":{
        //      "all":0
        //   },
        //   "dt":1427700245,
        //   "id":0,
        //   "name":"Mountain View",
        //   "cod":200
        //}

        var getWeather = function()
        {
            var request = new XMLHttpRequest();

            var method = 'GET';

            // if city/state given

            // if zip given

            // if using current location

            var url = 'http://api.openweathermap.org/data/2.5/weather?zip=' + zipcode + ','+ country + '&appid=0fb5360e492d477486818bdc1d8f752b'
            var async = true;
            request.open(method, url, async);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var data = JSON.parse(request.responseText);

                    $('#weather_pressure').val(data.main.pressure);
                    $('#weather_temperature').val(data.main.temp);
                }
            };
            request.send();
        };
    </script>

@stop