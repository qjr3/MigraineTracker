<?php $journals = $user->journals->sortByDesc('created_at')->take(5); ?>
@foreach($journals as $journal)
<div class='table table-striped'>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-12 h4'>{!! link_to_action('JournalController@show', $journal->name, $journal->id, []) !!}</div>
        </div>
        <div class='row '>
            <div class='col-sm-12 h5'>{{ $journal->description }}</div>
        </div>
        <div class='row '>
            <div class='col-sm-6'>{{$journal->has_nausea ? 'Nauseous' : 'Not Nauseous'}}</div>
            <div class='col-sm-6'>{{$journal->has_vomitted ? 'Vomitted' : 'Has not vomitted'}}</div>
        </div>
    </div>
</div>
@endforeach
<div class='container'>
    <div class='row content'>
        <div class='col-sm-12'>
            <span class='pull-right btn btn-link'>{!! link_to_action('JournalController@index', 'View All') !!}</span>
        </div>
    </div>
</div>