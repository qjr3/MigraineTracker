<div class='container'>
    @if(!$medicines->isEmpty())
        <div class='row'>
            <div class='col-sm-1'>#</div>
            <div class='col-sm-2'>Name</div>
            <div class='col-sm-6'>Description</div>
            <div class='col-sm-1'>Remove</div>
        </div>
        @foreach($medicines as $i => $medicine)
            <div class='row'>
                <div class='col-sm-1'>{{ $i }}</div> <!-- Adding 1 is missleading and wrong, the index starts at 0 so let it -->
                <div class='col-sm-2'>{!! link_to_action('MedicineController@edit', $medicine->name ,$medicine) !!}</div>
                <div class='col-sm-6'>{{$medicine->description}}</div>
                <div class='col-sm-1'>   
                    {!! Form::open( ['route' => ['medicine.destroy', $medicine], 'method' => 'delete']) !!}
                        <button type="submit" class="btn btn-danger btn-mini">X</button>
                    {!! Form::close() !!}
                </div>
            </div>
        @endforeach
    @else
        <div class='row'>
            <div class='col-sm-12'>Please Add Medication</div>
        </div>
    @endif
</div>

