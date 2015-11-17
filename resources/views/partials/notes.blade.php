        @foreach($notes as $note)
        <div class='row'>
            <div class='col-xs-12'>
                <strong>{!! link_to_action('NoteController@show', $note->name, $note->id, []) !!}</strong>
            </div>
        </div>
        <div class='row'>
            <div class='col-xs-12'>
                <em>{!! nl2br($note->description) !!}</em>
            </div>
        </div>
        @endforeach
        <div class='row'>
            <div class='col-xs-10'>
                {!! link_to_action('NoteController@create', 'Add Note', array(), ['class' => 'btn btn-info btn-primary']) !!}
            </div>
            <div class='col-xs-2 pull-right btn btn-link'>
                {!! link_to_action('NoteController@index', 'View All') !!}
            </div>
        </div>