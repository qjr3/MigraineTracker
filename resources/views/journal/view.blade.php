@extends('master')

@section('title')

@stop


@section('header')

@stop


@section('content')
    <h1>{{ $journal->name }}</h1>
    <h3>{{ $journal->description }}</h3>
    <div class="col-md-4">
        <table class="table table-hover table-striped">
            <tbody>
                <tr><th>Time Started</th><td>{{ $journal->start_time }}</td></tr>
                <tr><th>Time Ended</th><td>{{ $journal->end_time }}</td></tr>
                <tr><th>Severity</th><td>{{ $journal->severity }}</td></tr>
                <tr><th>Disrupted</th><td>{{ $journal->has_disrupted }}</td></tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <table class="table table-hover table-striped">
            <tbody>
            <tr><th>Light Sensitive</th><td>{{ $journal->has_light_sensativity }}</td></tr>
            <tr><th>Light Level</th><td>{{ $journal->light_level }}</td></tr>
            <tr><th>Sound Sensitive</th><td>{{ $journal->has_sound_sensativity }}</td></tr>
            <tr><th>Sound Level</th><td>{{ $journal->sound_level }}</td></tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <table class="table table-hover table-striped">
            <tbody>
            <tr><th>Nausea</th><td>{{ $journal->has_nausea }}</td></tr>
            <tr><th>Vomit</th><td>{{ $journal->has_vomitted }}</td></tr>
            <tr><th>Missed Work/School</th><td>{{ $journal->missed_workschool }}</td></tr>
            <tr><th>Missed Routines</th><td>{{ $journal->missed_routines }}</td></tr>
            </tbody>
        </table>
    </div>
    <h3>Location</h3>
    <div class="text-center">
        <iframe width="600" height="340" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $journal->loc_lat.', '.$journal->loc_long; ?>&hl=es;z=14&amp;output=embed"></iframe>
        <br /><small><a href="https://maps.google.com/maps?q='+data.lat+','+data.lon+'&hl=es;z=14&amp;output=embed" style="color:#0000FF;text-align:left" target="_blank">See map bigger</a></small>
    </div>
@stop

@section('footer')

@stop