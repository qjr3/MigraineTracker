<table class='table table-striped'>
    <thead>
    <tr class='th'>
        <th class=''>Name</th>
        <th class=''>Description</th>
        <th class=''>Remove</th>
    </tr>
    </thead>
    <tbody>
    @unless($medicines->isEmpty())
        @foreach($medicines as $medicine)
            <tr class=''>
                <td class=''>{!! link_to_action('MedicineController@edit', $medicine->name ,$medicine->id) !!}</td>
                <td class=''>{{$medicine->description}}</td>
                <td class=''>
                    {!! Form::open( ['route' => ['medicine.destroy', $medicine->id], 'method' => 'delete']) !!}
                    <button type="submit" class="btn btn-danger btn-xs center-block"><span
                                class='glyphicon glyphicon-remove-sign'></span></button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    @endunless
    </tbody>

</table>
