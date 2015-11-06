<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>

    @if($user->medicines->isEmpty())
        <tr>
            <td>Please add a medicine</td>
        </tr>
    @else
        @foreach($user->medicines as $i => $medicine)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{!! link_to_action('MedicineController@edit', $medicine->name , $medicine->id ) !!}</td>
                <td> {{$medicine->description}} </td>
            </tr>
        @endforeach

    @endif
    </tbody>
</table>
