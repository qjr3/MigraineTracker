@extends('master')

@section('title')

@stop


@section('header')

@stop

@section('content')
<div class='panel panel-info'>
    <div class='panel-heading'>
        <div class="row">
            <div class="col-xs-8 h3">{{ $journal->name }}</div>
            <div class='col-xs-2 h3'>{!! link_to_action('JournalController@edit', 'Edit' , $journal->id, ['class'=>'btn btn-warning btn-block']) !!}</div>
            <div class='col-xs-2 h3'>
                {!! Form::open( ['route' => ['journal.destroy', $journal], 'method' => 'delete']) !!}
                <button type="submit" class="btn btn-danger btn-block">Delete</button>
                {!! Form::close() !!}
            </div>
        </div>
        <div class='row'>
            <div class='col-xs-12 h4'><em>{!! nl2br($journal->description) !!}</em></div>
        </div>
    </div>
    <div class='panel-body'>
        <table class="table table-striped">
            <tbody>
                <tr>
                @if(!empty($journal->start_time) && !empty($journal->end_time))
                    <th>Duration</th>
                    <td class="text-center ">{{ $duration }}</td>
                @else
                    @if(!empty($journal->start_time) && empty($journal->end_time))
                        <th>Time Started</th>
                        <td class="text-center ">{{ $journal->start_time }}</td>
                    @elseif(!empty($journal->start_time) && empty($journal->end_time))
                        <th>Time Ended</th>
                        <td class="text-center ">{{ $journal->end_time }}</td>
                    @endif
                @endif
                </tr>
                <tr>
                    <th>Severity</th>
                    <td class="text-center ">{{ $journal->severity }}</td>
                </tr>
                <tr>
                    <th>Disruptions</th>
                    <td class='text-center {{ !empty($journal->has_disrupted) ? ($journal->has_disrupted=='true' ? ' danger' : ' success') : ' warning' }}'>{{ !empty($journal->has_disrupted) ? ($journal->has_disrupted=='true' ? 'Yes' : 'No') : '' }}</td>
                </tr>
                <tr>
                <tr>
                    <th>Light Level</th>
                    <td class='text-center'>{{ $journal->light_level }}</td>
                </tr>
                    <th>Light Sensitivity</th>
                    <td class='text-center {{ !empty($journal->has_light_sensitivity) ? ($journal->has_light_sensitivity=='true' ? ' danger' : ' success') : ' warning' }}'>{{ !empty($journal->has_light_sensitivity) ? ($journal->has_light_sensitivity=='true' ? 'Yes' : 'No') : '' }}</td>
                </tr>
                <tr>
                <tr>
                    <th>Sound Level</th>
                    <td class='text-center'>{{ $journal->sound_level }}</td>
                </tr>
                    <th>Sound Sensitivity</th>
                    <td class='text-center {{ !empty($journal->has_sound_sensitivity) ? ($journal->has_sound_sensitivity=='true' ? ' danger' : ' success') : ' warning' }}'>{!! !empty($journal->has_sound_sensitivity) ? ($journal->has_sound_sensitivity=='true' ? 'Yes' : 'No') : '' !!}  </td>
                </tr>
                <tr>
                    <th>Nauseous</th>
                    <td class='text-center {{ !empty($journal->has_nausea) ? ($journal->has_nausea=='true' ? ' danger' : ' success') : ' warning' }}'>
                        {!! !empty($journal->has_nausea) ? ($journal->has_nausea=='true' ? 'Yes' : 'No') : '' !!}  
                    </td>
                </tr>
                <tr>
                    <th>Vomited</th>
                    <td class='text-center {{ !empty($journal->has_vomited) ? ($journal->has_vomited=='true' ? ' danger' : ' success') : ' warning' }}'>
                        {!! !empty($journal->has_vomited) ? ($journal->has_vomited=='true' ? 'Yes' : 'No') : '' !!}
                    </td>
                </tr>
                <tr>
                    <th>Missed Work or School</th>
                    <td class='text-center {{ !empty($journal->missed_workschool) ? ($journal->missed_workschool=='true' ? ' danger' : ' success') : ' warning' }}'>
                        {!! !empty($journal->missed_workschool) ? ($journal->missed_workschool=='true' ? 'Yes' : 'No') : '' !!}  
                    </td>
                </tr>
                <tr>
                    <th>Missed Other Activities</th>
                    <td class='text-center {{ !empty($journal->missed_routines) ? ($journal->missed_routines=='true' ? ' danger' : ' success') : ' warning' }}'>
                        {!! !empty($journal->missed_routines) ? ($journal->missed_routines=='true' ? 'Yes' : 'No') : '' !!}  
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@stop

@section('footer')

@stop