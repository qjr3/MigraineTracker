@extends('master')

@section('content')
<h1>Journal Records</h1>

@foreach ($journal as $journals)
<li><a href='/journal/{{ $journals->id }}'>{{ $journals }}</li>
@endforeach
@stop