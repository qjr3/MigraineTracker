<table class="table table-striped">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Severity</th>
        <th>Temperature</th>
        <th>Pressure</th>
        <th>DELETE</th>
    </tr>			
    @foreach($journals as $journal)
    <tr>
        <td>{!! link_to_action('JournalController@show' , $journal->name, $journal->id) !!}</td>
        <td>{{ $journal->description }}</td>
        <td>{{ $journal->severity }}</td>
        <td>{{ $journal->weather_temperature }}</td>
        <td>{{ $journal->weather_pressure }}</td>
        <td>{!! Form::open( ['route' => ['journal.destroy', $journal], 'method' => 'delete']) !!}
                <button type="submit" class="btn btn-danger btn-mini">X</button>
        {!! Form::close() !!}</td>					
    </tr>
    @endforeach
</table>