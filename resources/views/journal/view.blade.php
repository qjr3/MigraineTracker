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
        <tr><td>location</td><td>{{ $journal->location }}</td></tr>
        <tr><td>severity</td><td>{{ $journal->severity }}</td></tr>
        <tr><td>noise_level</td><td>{{ $journal->noise_level }}</td></tr>
        <tr><td>sound_level</td><td>{{ $journal->sound_level }}</td></tr>
        <tr><td>start_time</td><td>{{ $journal->start_time }}</td></tr>
        <tr><td>end_Time</td><td>{{ $journal->end_Time }}</td></tr>
        <tr><td>Name</td><td>{{ $journal->name }}</td></tr>
        <tr><td>Name</td><td>{{ $journal->name }}</td></tr>
        <tr><td>Name</td><td>{{ $journal->name }}</td></tr>
        <tr><td>Name</td><td>{{ $journal->name }}</td></tr>
        <tr><td>Name</td><td>{{ $journal->name }}</td></tr>
        <tr><td>Name</td><td>{{ $journal->name }}</td></tr>
        <tr><td>Name</td><td>{{ $journal->name }}</td></tr>
        <tr><td>Description</td><td>{{ $journal->description }}</td></tr>
    </tbody>
</table>
@stop


@section('footer')

@stop