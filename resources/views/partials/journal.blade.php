<div class="col-md-12">
    <div class="row">
        <table class="table table-condensed table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Severity</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($journals->slice(0,5) as $journal)
                <tr>

                    <td>{{ $journal->name }}</td>
                    <td>{{ $journal->severity }}</td>
                    <td>{{ $journal->start_time ?: 'Not Available' }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>
                     
