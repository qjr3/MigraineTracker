<table class='table table-striped'>

        <tr class='th'>
            <th class=''>Label</th>
            <th class=''>Notes</th>
            <th class=''>Added</th>
            <th class=''>Updated</th>
            <th class=''>Remove</th>
        </tr>
    @unless($notes->isEmpty())
        @foreach($notes as $note)
        <tr class=''>
            <td class=''>{!! link_to_action('NoteController@edit', $note->name, $medicine->id) !!}</td>
            <td class=''>{{ $note->body }}</td>
            <td class=''>{{ $note->created_at }}</td>
            <td class=''>{{ $note->updated_at }}</td>
            <td class=''>
                {!! Form::open( ['route' => ['note.destroy', $note->id], 'method' => 'delete']) !!}
                   <button type="submit" class="btn btn-danger btn-xs center-block"><span class='glyphicon glyphicon-remove-sign'></span></button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    @endunless
</table>