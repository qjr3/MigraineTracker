<table class="table table-striped">
    <thead>
    <tr>
        <th>Trigger Name</th>
        <th>Description</th>
        <th>Dosage</th>
        <th># of Occurrences</th>
    </tr>
    </thead>
    <tbody>
    @foreach($user->medicines as $medicine)
        <tr>
            <td>Medication Name</td>
            <td>Description</td>
            <td>Dosage</td>
            <td># of Occurrences</td>
        </tr>
    @endforeach
    </tbody>
</table>