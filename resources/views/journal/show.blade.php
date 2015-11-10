@extends('master')

@section('title')

@stop


@section('header')

@stop


@section('content')
<div class='panel panel-info'>
    <div class='panel-heading'>
        <div class="row">
            <div class="col-sm-12 h1"><span>{{ $journal->name }}</span> &nbsp; &nbsp; <span class="pull-right" style="margin-bottom: 15px">{!! link_to_action('JournalController@edit', 'Edit' , $journal->id, ['class'=>'btn btn-block btn-primary']) !!} </span></div>
        </div>
        <div class='row'>
            <div class='col-sm-10 h4'><em>{!! nl2br($journal->description) !!}</div>
        </div>
    </div>
    <div class='panel-body'>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th>Start Time</th>
                    <td>{{ $journal->start_time }}</td>
                </tr>
                <tr>
                    <th>Stop Time</th>
                    <td>{{ $journal->end_time }}</td>
                </tr>
                <tr>
                    <th>Severity</th>
                    <td>{{ $journal->severity }}</td>
                </tr>
                <tr>
                    <th>Disruptions</th>
                    <td>{{ $journal->has_disrupted          ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Light Sensativity</th>
                    <td>{{ $journal->has_light_sensativity  ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Light Level</th>
                    <td>{{ $journal->light_level }}</td>
                </tr>
                <tr>
                    <th>Sound Sensativity</th>
                    <td>{{ $journal->has_sound_sensativity  ? 'Yes' : 'No' }}  </td>
                </tr>
                <tr>
                    <th>Sound Level</th>
                    <td>{{ $journal->sound_level }}</td>
                </tr>
                <tr>
                    <th>Nauseous</th>
                    <td>{{ $journal->has_nausea             ? 'Yes' : 'No' }}  </td>
                </tr>
                <tr>
                    <th>Vomitted</th>
                    <td>{{ $journal->has_vomitted           ? 'Yes' : 'No' }}  </td>
                </tr>
                <tr>
                    <th>Missed Work or School</th>
                    <td>{{ $journal->missed_workschool      ? 'Yes' : 'No' }}  </td>
                </tr>
                <tr>
                    <th>Missed Other Activities</th>
                    <td>{{ $journal->missed_routines        ? 'Yes' : 'No' }}  </td>
                </tr>
            </tbody>
        </table>
    </div>

</div
@stop

@section('footer')

@stop