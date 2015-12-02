@extends('master')
@section('title')
    Home
@stop
@section('content')

    <div class="col-md-12">
        <div class="row">


            <h2 class='text-center'>Welcome
                @if($user->first_name != null)
                    {{$user->first_name}}!
                @else
                    {{$user->name}}!
                @endif
            </h2>

            <h4 class="text-center">
            <span class="label label-danger"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
            Migraine 69% likely</span>
            </h4>

            <br>

            <div class="row">
                <div class="col-md-6">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Recent Journal Entries</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                @include('partials.journal')
                            </div>

                        </div>
                        <div class="panel-footer">{!! link_to_action('JournalController@index', 'View all') !!}</div>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Recent Notes & Questions</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                @include('partials.notes')
                            </div>

                        </div>
                        <div class="panel-footer">{!! link_to_action('JournalController@index', 'View all') !!}</div>
                    </div>

                </div>
            </div>


        </div>
    </div>








@stop