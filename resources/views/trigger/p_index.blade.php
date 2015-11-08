<div class='container'>
    @unless($triggers->isEmpty())
        <div class='row'>
            <div class='col-sm-2'>Name</div>
            <div class='col-sm-6'>Description</div>
            <div class='col-sm-1'>Remove</div>
        </div>
        @foreach($triggers as $i => $trigger)
            <div class='row'>
                <div class='col-sm-2'>{!! link_to_action('TriggerController@edit', $trigger->name ,$trigger) !!}</div>
                <div class='col-sm-6'>{{$trigger->description}}</div>
                <div class='col-sm-1'>   
                    {!! Form::open( ['route' => ['trigger.destroy', $trigger], 'method' => 'delete']) !!}
                        <button type="submit" class="btn btn-danger btn-mini">X</button>
                    {!! Form::close() !!}
                </div>
            </div>
        @endforeach
    @endunless
        <div class='row'>
            <div class='col-sm-12 h6'>Add New Trigger</div>
        </div>

        <div class='row'>
            {!! Form::open() !!}
            <div class='col-sm-3'>
                {!! Form::text('name', null, ['placeholder' => 'Trigger Name']) !!} 
            </div>
            <div class='col-sm-3'>
                {!! Form::text('name', null, ['placeholder' => 'Trigger Description']) !!} 
            </div>
            <div class='col-sm-3'>
                {!! Form::submit('ADD') !!} 
            </div>
            <div class='col-sm-3'>
                
            </div>
            {!! Form::close() !!}
        </div> 
</div>
