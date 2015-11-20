<table class="table table-striped">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Severity</th>
        <th>Temperature</th>
        <th>Pressure</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>			
    @foreach($journals as $journal)
    <tr>
        <td>{!! link_to_action('JournalController@show' , $journal->name, $journal->id) !!}</td>
        <td>{{ $journal->description }}</td>
        <td>{{ $journal->severity }}</td>
        <td>{{ $journal->weather_temperature }}</td>
        <td>{{ $journal->weather_pressure }}</td>
        <td><span class='btn btn-warning btn-xs center-block'>{!! link_to_action('JournalController@edit', 'Edit', $journal->id) !!}</td>
        <td>{!! Form::open( ['route' => ['journal.destroy', $journal], 'method' => 'delete']) !!}
            <button type="submit" class="btn btn-danger btn-xs center-block">DELETE</button>
        {!! Form::close() !!}</td>					
    </tr>
    @endforeach
</table>