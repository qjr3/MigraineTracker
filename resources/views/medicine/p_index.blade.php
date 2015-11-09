<table class='table table-striped'>
        <tr class='th'>
            <th class='' colspan='3'>Add New Medication</th>
        </tr>

        <tr class=''>
            {!! Form::open() !!}
            <td class=''>
                {!! Form::text('name', null, ['placeholder' => 'Medication Name']) !!} 
            </td>
            <td class=''>
                {!! Form::text('description', null, ['placeholder' => 'Medication Description']) !!} 
            </td>
            <td class=''>
                {!! Form::submit('ADD') !!} 
            </td>
            {!! Form::close() !!}
        </tr>
    @unless($medicines->isEmpty())
        <tr class='th'>
            <th class=''>Name</th>
            <th class=''>Description</th>
            <th class=''>Remove</th>
        </tr>
        @foreach($medicines as $i => $medicine)
        <tr class=''>
            <td class=''>{!! link_to_action('MedicineController@edit', $medicine->name ,$medicine) !!}</td>
            <td class=''>{{$medicine->description}}</td>
            <td class=''>   
                {!! Form::open( ['route' => ['medicine.destroy', $medicine], 'method' => 'delete']) !!}
                    <button type="submit" class="btn btn-danger btn-mini">X</button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    @endunless
</table>

