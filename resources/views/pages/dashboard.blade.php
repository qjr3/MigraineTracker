@extends('master')
@section('title')
Home
@stop
@section('content')
<div class='panel panel-info'>
    <div class='panel-heading text-center'>
        <h2>Welcome
            @if($user->first_name != null)
                {{$user->first_name}}!
            @else
                {{$user->name}}!
            @endif
        </h2>
        <h3 class='alert-danger'>Migraine XX% likely</h3>
    </div>
    @include('partials.journal')
</div>
@stop