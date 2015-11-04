<?php $journals = $user->journals->sortByDesc('created_at')->take(3); ?>
@foreach($journals as $journal)
<table class="table">
    <tbody>
        <tr class='h1'><td colspan='2'>{!! link_to_action('JournalController@show', $journal->name, $journal->id, []) !!}</td></tr>
        <tr>
            <td class="" colspan='2'>{{ $journal->description }}</td>
        </tr>
        <tr>
            <td class="">{{$journal->has_nausea ? 'Nauseous' : 'Not Nauseous'}}</td>
            <td class="">{{$journal->has_vomitted ? 'Has Vomitted' : 'Has not vomitted'}}</td>
        </tr>
    </tbody>
</table>
<hr />
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