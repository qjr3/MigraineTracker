<div class='container'>
    @if(!$triggers->isEmpty())
        <div class='row'>
            <div class='col-sm-1'>#</div>
            <div class='col-sm-2'>Name</div>
            <div class='col-sm-6'>Description</div>
            <div class='col-sm-1'>Remove</div>
        </div>
        @foreach($triggers as $i => $trigger)
            <div class='row'>
                <div class='col-sm-1'>{{ $i }}</div> <!-- Adding 1 is missleading and wrong, the index starts at 0 so let it -->
                <div class='col-sm-2'>{!! link_to_action('TriggerController@edit', $trigger->name ,$trigger) !!}</div>
                <div class='col-sm-6'>{{$trigger->description}}</div>
                <div class='col-sm-1'>   
                    {!! Form::open( ['route' => ['trigger.destroy', $trigger], 'method' => 'delete']) !!}
                        <button type="submit" class="btn btn-danger btn-mini">X</button>
                    {!! Form::close() !!}
                </div>
            </div>
        @endforeach
    @else
        <div class='row'>
            <div class='col-sm-12'>Please Add a trigger</div>
        </div>
    @endif
</div>