
        @foreach($journals as $journal)
        <div class='row'>
            <div class='col-xs-12'>
                <table class='table table-condensed table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th colspan="12">{!! link_to_action('JournalController@show', $journal->name, $journal->id, []) !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="12">{!! nl2br($journal->description) !!}</td>
                        </tr>
                        <tr>
                            <th colspan='4'>Severity</th>
                            <th colspan="4">Started</th>
                            <th colspan="4">Ended</th>
                        </tr>
                        <tr>
                            <td colspan='4'>{{ $journal->severity }}</td>
                            <td colspan="4">{{ $journal->start_time }}</td>
                            <td colspan="4">{{ $journal->end_time }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{{$journal->has_nausea ? 'Nauseous' : 'Not Nauseous'}}</td>
                            <td colspan="2">{{$journal->has_vomited ? 'Vomited' : 'Has not vomited'}}</td>
                            <td colspan="8">&nbsp;</td>


                        </tr>
                        <tr>
                            <th colspan='6'>Created On</th>
                            <th colspan='6'>Updated On</th>
                        </tr>
                        <tr>
                            <td colspan='6'>{{ $journal->create_at }}</td>
                            <td colspan='6'>{{ $journal->updated_at }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <td colspan="2">
                            {!! link_to_action('JournalController@show', 'Details', $journal->id, ['class' => 'btn btn-xs btn-block btn-info']) !!}
                        </td>
                        <td colspan="2">
                            {!! link_to_action('JournalController@edit', 'Edit', $journal->id, ['class' => 'btn btn-xs btn-block btn-warning']) !!}
                        </td>
                        <td colspan="2">
                            {!! Form::open( ['route' => ['journal.destroy', $journal], 'method' => 'delete']) !!}
                            <button type="submit" class="btn btn-xs btn-danger btn-block">DELETE</button>
                            {!! Form::close() !!}
                        </td>
                        <td colspan="6"></td>

                    </tfoot>
                </table>
            </div>
        </div>
        @endforeach
        <div class='row'>
            <div class='col-xs-10 '>
                {!! link_to_action('JournalController@create', 'Add Journal', array(), ['class' => 'btn btn-block btn-success']) !!}
            </div>
            <div class='col-xs-2 pull-right btn btn-link'>
                {!! link_to_action('JournalController@index', 'View All') !!}
            </div>
        </div>
                     
