@extends('master')
@section('title')
Home
@stop
@section('content')

<div class='row'>
        <h2 class='text-center col-xs-12'>Welcome
            @if($user->first_name != null)
                {{$user->first_name}}!
            @else
                {{$user->name}}!
            @endif
        </h2>
</div>
<div class='row'>
    <div class='col-xs-12 alert-danger text-center h3'>Migraine XX% likely</div>
</div>

{{-- Once Notes are implemented correctly, this can be used.
<div class='row'>
    <div class='col-xs-4'>
        @include('partials.notes')
    </div>
    <div class='col-xs-7 col-xs-offset-1'>
        @include('partials.journal')
    </div>
</div>
--}}
{{-- Insead of this --}}
<div class='row'>
    <div class='col-xs-12'>
        @include('partials.journal')
    </div>
</div>

@stop