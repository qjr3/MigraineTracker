
<table class='table table-striped'>
        <tr class=''>
            <th class=''>Name</th>
            <th class=''>Description</th>
            <th class=''>Remove</th>
        </tr>
    @unless($triggers->isEmpty())
        @foreach($triggers as $trigger)
            <tr class=''>
                <td class=''>{!! link_to_action('TriggerController@edit', $trigger->name ,$trigger->id) !!}</td>
                <td class=''>{{$trigger->description}}</td>
                <td class=''>
                    {!! Form::open( ['route' => ['trigger.destroy', $trigger->id], 'method' => 'delete']) !!}
                        <button type="submit" class="btn btn-danger btn-mini">X</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    @endunless
</table>


