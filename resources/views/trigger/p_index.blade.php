<table class='table table-striped'>
        <tr class=''>
            <th class='' colspan='3'>Add New Trigger</th>
        </tr>

        <tr class=''>
            {!! Form::open() !!}
            <td class=''>
                {!! Form::text('name', null, ['placeholder' => 'Trigger Name']) !!} 
            </td>
            <td class=''>
                {!! Form::text('name', null, ['placeholder' => 'Trigger Description']) !!} 
            </td>
            <td class=''>
                {!! Form::submit('ADD') !!} 
            </td>
            {!! Form::close() !!}
        </tr> 
    @unless($triggers->isEmpty())
        <tr class=''>
            <th class=''>Name</th>
            <th class=''>Description</th>
            <th class=''>Remove</th>
        </tr>
        @foreach($triggers as $i => $trigger)
            <tr class=''>
                <td class=''>{!! link_to_action('TriggerController@edit', $trigger->name ,$trigger) !!}</td>
                <td class=''>{{$trigger->description}}</td>
                <td class=''>   
                    {!! Form::open( ['route' => ['trigger.destroy', $trigger], 'method' => 'delete']) !!}
                        <button type="submit" class="btn btn-danger btn-mini">X</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    @endunless
</table>
