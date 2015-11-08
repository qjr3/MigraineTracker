@extends('master')
@section('title')
Home
@stop
@section('content')
    <div class="jumbotron text-center alert-info">
        <h2>Welcome
            @if($user->first_name != null)
                {{$user->first_name}}!
            @else
                {{$user->name}}!
            @endif
        </h2>
        <div class="">
            <h3 class="">Migraine XX% likely</h3>
        </div>
    </div>

    @include('partials.journal')

@stop