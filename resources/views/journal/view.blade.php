@extends('master')

@section('title')

@stop


@section('header')

@stop


@section('content')
<table border='1'>
    <trow></trow>
    <tbody>
        <tr><td>Name</td><td>{{ $journal->name }}</td></tr>
        <tr><td>Description</td><td>{{ $journal->description }}</td></tr>
        <tr><td>Severity</td><td>{{ $journal->severity }}</td></tr>
        <tr><td>Location</td><td id="geo-map"><!-- Will show a map here --></td></tr>
        <tr><td>Light Level</td><td>{{ $journal->light_level }}</td></tr>
        <tr><td>Sound_level</td><td>{{ $journal->noise_level }}</td></tr>
        <tr><td>Started At</td><td>{{ $journal->start_time }}</td></tr>
        <tr><td>Ended At</td><td>{{ $journal->end_Time }}</td></tr>
        <tr><td>Name</td><td>{{ $journal->name }}</td></tr>
        <tr><td>Name</td><td>{{ $journal->name }}</td></tr>
        <tr><td>Name</td><td>{{ $journal->name }}</td></tr>
        <tr><td>Name</td><td>{{ $journal->name }}</td></tr>
        <tr><td>Name</td><td>{{ $journal->name }}</td></tr>
        <tr><td>Name</td><td>{{ $journal->name }}</td></tr>
        <tr><td>Name</td><td>{{ $journal->name }}</td></tr>
    </tbody>
</table>
@stop


@section('footer')

@stop