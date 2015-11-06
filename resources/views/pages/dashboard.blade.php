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
    
    <div class="flex-container flex-hcenter">
        {!! link_to_action('JournalController@create', 'Add Journal', array(), ['class' => 'btn-info btn-flex flex-basis-1 flex-hcenter flex-basis-1']) !!}
    </div>
@stop