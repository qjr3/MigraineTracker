@extends('master')
@section('title')
Home
@stop
@section('content')
    <div class="jumbotron text-center alert-info">
        <h1>Welcome
            @if($user->first_name != null)
                {{$user->first_name}}!
            @else
                {{$user->name}}!
            @endif
        </h1>
        <div class="flex-container flex-hcenter">
            <h3 class="alert-danger flex-hcenter">Migraine XX% likely</h3>
        </div>
    </div>
    @include('partials.journal')
    <div class="flex-container flex-hcenter">
        {!! link_to_action('JournalController@create', 'Add Journal', array(), ['class' => 'btn-info btn-flex flex-basis-1 flex-hcenter btn-flex-big flex-basis-1']) !!}
    </div>
@stop