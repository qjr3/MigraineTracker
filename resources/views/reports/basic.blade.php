@extends('reports.wrapper')

@section('header')

@stop

@section('body')
    <p>This report was generated
        for: {{ $user->first_name ? $user->first_name . " " . $user->last_name  : $user->name }}</p>

    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Trigger Name</th>
                <th># of occurrences</th>
            </tr>
        </thead>
        <tbody>
        @foreach($triggers->slice(0,5) as $trigger)

            <tr>
                <td>{{ $trigger->name }}</td>
                <td>{{ $trigger->occurrences() }}</td>
            </tr>

        @endforeach
        </tbody>
    </table>

    <br>

    <table class="table">
        <thead>
        <tr>
            <th>Medicine Name</th>
            <th># of occurrences</th>
        </tr>
        </thead>
        <tbody>
        @foreach($medicines->slice(0,5) as $medicine)

            <tr>
                <td>{{ $medicine->name }}</td>
                <td>{{ $medicine->occurrences() }}</td>
            </tr>

        @endforeach
        </tbody>
    </table>

    <br>

    <table class="table">
        <thead>
        <tr>
            <th>Notes Name</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($notes->slice(0,5) as $notes)

            <tr>
                <td>{{ $notes->name }}</td>
                <td>{{ $notes->body }}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
@stop

@section('footer')

@stop