<table class='table table-striped'>
        <tr class=''>
            <th class='' colspan='3'>Add New Note</th>
        </tr>

        <tr class=''>
            {!! Form::open() !!}
            <td class=''>
                {!! Form::text('name', null, ['placeholder' => 'Note name']) !!} 
            </td>
            <td class=''>
                {!! Form::text('body', null, ['placeholder' => 'Note Body']) !!} 
            </td>
            <td class=''>
                {!! Form::submit('ADD') !!} 
            </td>
            {!! Form::close() !!}
        </tr> 
    @unless($notes->isEmpty())
        <tr class=''>
            <th class=''>Name</th>
            <th class=''>Body</th>
            <th class=''>Remove</th>
        </tr>
        @foreach($notes as $i => $note)
            <tr class=''>
                <td class=''>{!! link_to_action('NoteController@edit', $note->name ,$note) !!}</td>
                <td class=''>{{$note->description}}</td>
                <td class=''>   
                    {!! Form::open( ['route' => ['note.destroy', $note], 'method' => 'delete']) !!}
                        <button type="submit" class="btn btn-danger btn-mini">X</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    @endunless
</table>
