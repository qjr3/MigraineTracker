@extends('master')

@section('title')User Profile @stop

@section('content')
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-3">
                <div class='panel panel-info'>
                    <div class='panel-heading container-fluid'>
                        <div class='row'>
                            <div class='col-xs-6 text-left'><h3>Personal Info</h3></div>
                            <div class='col-xs-6 text-right'>
                                <h3>{!! link_to_action('UserController@edit', 'Edit', $user->id, ['class' => 'btn btn-primary', 'role' => 'button']) !!}</h3>
                            </div>
                        </div>
                    </div>

                    <div class='panel-body'>
                        <div class="glyphicon glyphicon-user center-block text-center" aria-hidden="true"
                             style="font-size: 180px"></div>
                        <br>

                        <div class='col-md-12'>
                            <div class="row">

                                <p class="text-primary pull-left"><strong>Username:</strong></p>

                                <div class="pull-right"><strong>{{ $user->name }}</strong></div>

                            </div>
                            <div class="row">

                                <p class="text-primary pull-left"><strong>First Name:</strong></p>

                                <div class="pull-right"><strong>{{ $user->first_name }} </strong></div>

                            </div>
                            <div class="row">
                                <p class="text-primary pull-left"><strong>Last Name:</strong></p>

                                <div class="pull-right"><strong>{{ $user->last_name }}</strong></div>
                            </div>
                            <div class="row">
                                <p class="text-primary pull-left"><strong>Email:</strong></p>

                                <div class="pull-right"><strong>{{ $user->email }}</strong></div>
                            </div>
                            <div class="row">
                                <p class="text-primary pull-left"><strong>Locale: </strong></p>

                                <div class="pull-right"><strong>{{ $user->locale }}</strong></div>
                            </div>

                            <div class="row">
                                <p class="text-primary pull-left"><strong>Gender:</strong></p>

                                <div class="pull-right"><strong>{{ $user->gender }}</strong></div>
                            </div>
                            <div class="row">
                                <p class="text-primary pull-left"><strong>Birthday:</strong></p>

                                <div class="pull-right"><strong>{{ $user->date_of_birth }}</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class='panel panel-info'>
                    <div class='panel-heading'>
                        <h4>Medical History</h4>
                    </div>
                    <div class='panel-body'>
                        <table class="table table-striped">
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
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading ">
                        <h4>Triggers</h4>
                    </div>
                    <div class="panel-body ">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Trigger Name</th>
                                <th>Description</th>
                                <th># of Occurrences</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($triggers->slice(0,5) as $trigger)
                                <tr>
                                    <td>{{ $trigger->name }}</td>
                                    <td>{{ $trigger->description }}</td>
                                    <td>{{ $trigger->occurrences() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>Medications</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Medicine Name</th>
                                <th>Description</th>
                                <th>Dosage</th>
                                <th># of Occurrences</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($medicines->slice(0,5) as $medicine)
                                <tr>
                                    <td>{{ $medicine->name }}</td>
                                    <td>{{ $medicine->description }}</td>
                                    <td>{{ $medicine->dose }}</td>
                                    <td>{{ $medicine->occurrences() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
@stop
