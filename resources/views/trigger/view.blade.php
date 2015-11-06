<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
    @if($user->triggers->isEmpty())
        <tr>
            <td>Please add a Trigger</td>
        </tr>
    @else
        @foreach($user->triggers as $i => $trigger)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{!! link_to_action('TriggerController@edit', $trigger->name ,$trigger->id) !!}</td>
                <td> {{$trigger->description}} </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>


