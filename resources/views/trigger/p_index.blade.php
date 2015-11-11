<table class="table table-striped">
    <thead>
    <tr>
        <th>Trigger Name</th>
        <th>Description</th>
        <th># of Occurrences</th>
    </tr>
    </thead>
    <tbody>
    @foreach($user->triggers as $trigger)
        <tr>
            <td>Trigger Name</td>
            <td>Description</td>
            <td># of Occurrences</td>
        </tr>
    @endforeach
    </tbody>

</table>


