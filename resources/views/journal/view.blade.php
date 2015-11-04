@extends('master')

@section('title')

@stop


@section('header')

@stop


@section('content')
<div class='h1'><span class='pull-left'>{{ $journal->name }}</span><span class='pull-right'>{!! link_to_action('JournalController@edit', $journal->name, $journal->id, []) !!}</span></div>
    <div class='h3'>{{ $journal->description }}</div>
    <div class="col-md-4">
        <table class="table table-striped">
            <tbody>
            <tr><th>Time Started</th>       <td>{{ $journal->start_time }}                             </td></tr>
            <tr><th>Time Ended</th>         <td>{{ $journal->end_time }}                               </td></tr>
            <tr><th>Severity</th>           <td>{{ $journal->severity }}                               </td></tr>
            <tr><th>Disrupted</th>          <td>{{ $journal->has_disrupted          ? 'Yes' : 'No' }}  </td></tr>
            <tr><th>Light Sensitive</th>    <td>{{ $journal->has_light_sensativity  ? 'Yes' : 'No' }}  </td></tr>
            <tr><th>Light Level</th>        <td>{{ $journal->light_level }}                            </td></tr>
            <tr><th>Sound Sensitive</th>    <td>{{ $journal->has_sound_sensativity  ? 'Yes' : 'No' }}  </td></tr>
            <tr><th>Sound Level</th>        <td>{{ $journal->sound_level }}                            </td></tr>
            <tr><th>Nausea</th>             <td>{{ $journal->has_nausea             ? 'Yes' : 'No' }}  </td></tr>
            <tr><th>Vomit</th>              <td>{{ $journal->has_vomitted           ? 'Yes' : 'No' }}  </td></tr>
            <tr><th>Missed Work/School</th> <td>{{ $journal->missed_workschool      ? 'Yes' : 'No' }}  </td></tr>
            <tr><th>Missed Routines</th>    <td>{{ $journal->missed_routines        ? 'Yes' : 'No' }}  </td></tr>
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