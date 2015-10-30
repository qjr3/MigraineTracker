@extends('master')

@section('title')User Profile @stop

@section('content')

    <div class="col-md-3">
        <h2>Personal Info</h2>
        <hr>
        <div class="row text-center">
            <span class="glyphicon glyphicon-user text-center" aria-hidden="true" style="font-size: 180px"></span>
        </div>
        <br>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="clearfix">
                    <strong><p class="text-primary pull-left">Username:</p>

                        <div class="pull-right">{{ $user->name }}</div>
                    </strong>
                </div>
                <div class="clearfix">
                    <strong><p class="text-primary pull-left">First Name:</p>

                        <div class="pull-right">{{ $user->first_name }}</div>
                    </strong>
                </div>
                <div class="clearfix">
                    <strong><p class="text-primary pull-left">Last Name:</p>

                        <div class="pull-right">{{ $user->last_name }}</div>
                    </strong>
                </div>
                <div class="clearfix">
                    <strong><p class="text-primary pull-left">Email:</p>

                        <div class="pull-right">{{ $user->email }}</div>
                    </strong>
                </div>
                <div class="clearfix">
                    <strong><p class="text-primary pull-left">Gender:</p>

                        <div class="pull-right">{{ $user->gender }}</div>
                    </strong>
                </div>
                <div class="clearfix">
                    <strong><p class="text-primary pull-left">Age:</p>

                        <div class="pull-right">{{ $user->age }}</div>
                    </strong>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <h2>General Info</h2>
        <hr>
        {!! link_to_action('UserController@showProfile', 'Cancel Edit', $user->id, ['class' => 'btn btn-default pull-right', 'role' => 'button']) !!}
        <div class="page-header">
            <h4>Medical History
                <small>Information</small>
            </h4>

            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Have you been diagnosed with diabetes?</p>

                    <p>Have you been diagnosed with migraines?</p>

                    <p>Do you wear prescription glasses?</p>

                    <p>When was your last eye exam?</p>
                </div>
            </div>
        </div>
        <div class="page-header clearfix">
            <h4>Triggers
                <small>Information</small>
            </h4>
            <div class="panel panel-default">
                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="page-header clearfix">
            <h4>Medications
                <small>Information</small>
            </h4>
            <div class="panel panel-default">
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
@stop

