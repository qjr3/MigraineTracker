<div class='container'>
    <div class='row'>
        <div class='col-sm-4'>#</div>
        <div class='col-sm-4'>Note Name</div>
        <div class='col-sm-4'>Note Body</div>
    </div>
    <div class='row'>
        <div class='col-sm-4'>{!! link_to_action('NoteController@edit', $note->name ,$note->id) !!}</div>
        <div class='col-sm-4'>{{$notes->body}}</div>
        <div class='col-sm-4'>{!! link_to_action('NoteController@destroy', 'Remove Note', $note, ['class' => 'btn']) !!}</div>
    </div>
</div>
