<?php $journals = $user->journals->sortByDesc('created_at')->take(3); ?>
@foreach($journals as $journal)
<h3>{{$journal->name ?: 'Journal ' . $journal->created_at}}</h3>
<table class="table table-hover">
    <tbody>
        <tr>
            <td>Description:</td><td class="text-right">{{$journal->description ?: ''}}</td>
        </tr>
        <tr>
            <td>Nauseous: </td><td class="text-right">{{$journal->has_nausea ? 'Yes' : 'No'}}</td>
        </tr>
        <tr>
            <td>Vomited: </td><td class="text-right">{{$journal->has_vomitted ? 'Yes' : 'No'}}</td>
        </tr>
    </tbody>
</table>
@endforeach
<table class="table table-hover">
    <tbody>
        <tr>
            <td class="text-right">
                {!! link_to_action('JournalController@index', 'View All') !!}
            </td>
        </tr>
    </tbody>
</table>