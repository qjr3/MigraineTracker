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
                    <strong><p class="text-primary pull-left">Locale:</p>

                        <div class="pull-right">{{ $user->locale }}</div>
                    </strong>
                </div>
                
                <div class="clearfix">
                    <strong><p class="text-primary pull-left">Gender:</p>

                        <div class="pull-right">{{ $user->gender }}</div>
                    </strong>
                </div>
                <div class="clearfix">
                    <strong><p class="text-primary pull-left">Birthdate:</p>

                        <div class="pull-right">{{ $user->date_of_birth }}</div>
                    </strong>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <h2>General Info</h2>
        <hr>
        {!! link_to_action('UserController@edit', 'Edit', $user->id, ['class' => 'btn btn-primary pull-right', 'role' => 'button']) !!}
        <div class="page-header">
            <h4>Medical History
                <small>Information</small>
            </h4>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Have you been diagnosed with diabetes?</td>
                                <td>
                                    {{ $user->has_diabetes ? 'Yes' : 'No' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Have you been diagnosed with migraines?</td>
                                <td>
                                    {{ $user->has_migraines ? 'Yes' : 'No' }}
                                </td>
                            </tr>

                            <tr>
                                <td>Do you wear prescription glasses?</td>
                                <td>
                                    {{ $user->has_glasses ? 'Yes' : 'No' }}
                                </td>
                            </tr>

                            <tr>
                                <td>When was your last eye exam?</td>
                                <td>
                                    {{ $user->last_eye_exam_date ?: 'Never' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
        </div>
        <div class="page-header clearfix">
            <h4>Triggers
                <small>Information</small>
            </h4>
            <div class="panel panel-default">
                <div class="panel-info form-padding-top">
                    @include('trigger.view')
                </div>
                <div class="panel-body">
                    @include('trigger.create')
                </div>
            </div>
        </div>
        <div class="page-header clearfix">
            <h4>Medications
                <small>Information</small>
            </h4>
            <div class="panel panel-default">
                <div class="panel-info form-padding-top">
                    @include('medicine.view')
                </div>
                <div class="panel-body">
                    @include('medicine.create')
                </div>
            </div>
        </div>
    </div>
@stop

