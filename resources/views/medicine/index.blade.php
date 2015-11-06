<h1>Medicines</h1>

<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Dose</th>
    </tr>
    </thead>
    <tbody>
    @foreach($medicines as $i => $medicine)
    <tr>
        <td>{{ $i }}</td>
        <td>{!! link_to_action('MedicineController@show' , $medicine->name, $medicine->id) !!}</td>
        <td>{{ $medicine->description }}</td>
        <td>{{ $medicine->dose }}</td>
    </tr>
    @endforeach
    </tbody>
</table>