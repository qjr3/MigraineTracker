<div class='container'>
    @unless($medicines->isEmpty())
        <div class='row'>
            <div class='col-sm-2'>Name</div>
            <div class='col-sm-6'>Description</div>
            <div class='col-sm-1'>Remove</div>
        </div>
        @foreach($medicines as $i => $medicine)
            <div class='row'>
                <div class='col-sm-2'>{!! link_to_action('MedicineController@edit', $medicine->name ,$medicine) !!}</div>
                <div class='col-sm-6'>{{$medicine->description}}</div>
                <div class='col-sm-1'>   
                    {!! Form::open( ['route' => ['medicine.destroy', $medicine], 'method' => 'delete']) !!}
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
                {!! Form::text('name', null, ['placeholder' => 'Medication Name']) !!} 
            </div>
            <div class='col-sm-3'>
                {!! Form::text('description', null, ['placeholder' => 'Medication Description']) !!} 
            </div>
            <div class='col-sm-3'>
                {!! Form::text('dose', null, ['placeholder' => 'Dosage']) !!}
            </div>
            <div class='col-sm-3'>
                {!! Form::submit('ADD') !!} 
            </div>
            {!! Form::close() !!}
        </div>
</div>

