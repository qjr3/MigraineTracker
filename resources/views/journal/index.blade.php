@extends('master')

@section('content')
<h1>Journal Records</h1>

<table class="table table-striped">


  <thead>
  	<tr>
  		<th>#</th>
  		<th>Name</th>
  		<th>Severity</th>
  		<th>Location</th>
  	</tr>
  </thead>
  <tbody>
  	@foreach($journals as $i => $journal)
		<tr>
			<td>{{ $i }}</td>
			<td>{!! link_to_action('JournalController@show' , $journal->name, $journal->id) !!}</td>
			<td>{{ $journal->severity }}</td>
			<td>{{ $journal->location }}</td>
		</tr>
	@endforeach
  	
  </tbody>
</table>

@stop