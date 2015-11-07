@extends('master')

@section('title')

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
            <div class='col-sm-2'><span class="pull-right" style="margin-bottom: 15px">{!! link_to_action('JournalController@edit', trans('general.edit') , $journal->id) !!} </span></div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>{{ trans('journal.start_time') }}</th>
                        <td>{{ $journal->start_time }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('journal.stop_time')}}</th>
                        <td>{{ $journal->end_time }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('journal.severity')}}</th>
                        <td>{{ $journal->severity }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('journal.has_disruption')}}</th>
                        <td>{{ $journal->has_disrupted          ? trans('general.yes') : trans('general.no') }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('journal.light_sensative')}}</th>
                        <td>{{ $journal->has_light_sensativity  ? trans('general.yes') : trans('general.no') }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('journal.light_level')}}</th>
                        <td>{{ $journal->light_level }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('journal.sound_sensative') }}</th>
                        <td>{{ $journal->has_sound_sensativity  ? trans('general.yes') : trans('general.no') }}  </td>
                    </tr>
                    <tr>
                        <th>{{ trans('journal.sound_level') }}</th>
                        <td>{{ $journal->sound_level }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('journal.nauseous')}}</th>
                        <td>{{ $journal->has_nausea             ? trans('general.yes') : trans('general.no') }}  </td>
                    </tr>
                    <tr>
                        <th>{{ trans('journal.vomitted')}}</th>
                        <td>{{ $journal->has_vomitted           ? trans('general.yes') : trans('general.no') }}  </td>
                    </tr>
                    <tr>
                        <th>{{ trans('journal.missed_workschool')}}</th>
                        <td>{{ $journal->missed_workschool      ? trans('general.yes') : trans('general.no') }}  </td>
                    </tr>
                    <tr>
                        <th>{{ trans('journal.missed_other')}}</th>
                        <td>{{ $journal->missed_routines        ? trans('general.yes') : trans('general.no') }}  </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class='row'>
                <div class="col-md-4">
                    <h4>{{ trans('journal.location') }}</h4>
                    <div class="text-center">
                        <iframe width="" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                style="width: 100%;"
                                src="https://maps.google.com/maps?q=<?php echo $journal->loc_lat . ', ' . $journal->loc_long; ?>&hl=es;z=16&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')

@stop