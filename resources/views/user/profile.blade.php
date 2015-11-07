@extends('master')

@section('title')User Profile @stop

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">

                <h2>Personal Info
                    &nbsp; {!! link_to_action('UserController@edit', 'Edit', $user->id, ['class' => 'btn btn-primary pull-right', 'role' => 'button']) !!}</h2>
                <hr>
                <div class="row text-center">
                    <span class="glyphicon glyphicon-user text-center" aria-hidden="true"
                          style="font-size: 180px"></span>
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
                <div class="page-header">
                    <h4>Medical History</h4>
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
                                {{ $user->last_eye_exam ?: 'Never' }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <div class="page-header clearfix">
                        <h4>Triggers</h4>

                        <div class="panel panel-default">
                            <div class="panel-info form-padding-top">
                                <?php $triggers = $user->triggers; ?>
                                @include('trigger.index')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="page-header clearfix">
                        <h4>Medications</h4>

                        <div class="panel panel-default">
                            <div class="panel-info form-padding-top">
                                <?php $medicines = $user->medicines; ?>
                                @include('medicine.index')
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@stop

