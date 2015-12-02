<div class="col-md-12">
    <div class="row">
        <table class="table table-condensed table-striped">
            <thead>
            <tr>
                <th>Label</th>
                <th>Detail</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notes->slice(0,5) as $note)
                <tr>

                    <td class=''>{!! link_to_action('NoteController@edit', $note->name, $note->id) !!}</td>
                    <td>{{ $note->body }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>