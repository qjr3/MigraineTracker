@extends('master')

@section('content')
<h1>Journal Records</h1>

@foreach ($journals as $journal)
<li><a href='/songs/1'>{{ $journal }}</li>
@endforeach
@stop