@extends('master')

@section('title')User Profile @stop

@section('content')
    {!!  Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PATCH']) !!}
    <div class="col-md-3">
        <h2>Personal Info</h2>
        <hr>
        <div class="row text-center">
            <span class="glyphicon glyphicon-user text-center" aria-hidden="true" style="font-size: 180px"></span>
        </div>
        
        <br />

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="clearfix">
                    <strong>
                        <p class="text-primary pull-left">Username:</p>
                        <div class="pull-right">{{ $user->name }}</div>
                    </strong>
                </div>

                <div class="clearfix  form-group">
                    {!! Form::label('first_name', 'First Name', ['class' => 'sr-only']) !!}
                    {!! Form::text('first_name', null,  ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                </div>

                <div class="clearfix form-group">
                    {!! Form::label('last_name', 'Last Name', ['class' => 'sr-only']) !!}
                    {!! Form::text('last_name', null,  ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                </div>
                
                <div class="clearfix form-group">
                    {!! Form::label('email', 'Email', ['class' => 'sr-only']) !!}
                    {!! Form::email('email', null,  ['class' => 'form-control', 'type' => 'email', 'placeholder' => 'Email']) !!}
                </div>
                
                <div class="clearfix form-group">
                    {!! Form::select('locale', 
                    [
                    'en-US' => 'en-US'
                    // When we add more... like fr_FR or jp_JP or es_ES and es_MX
                    ], 
                    null, ['class' => 'form-control' , 'placeholder' => 'Locale']) !!}
                </div>

                <div class="clearfix form-group">
                    {!! Form::select('gender', 
                    [ // these are just some of the more common. however we know that gender is NOT binary so this is a good start.
                    'Bigender' => 'Bigender',
                    'Cisgender Female' => 'Cisgender Female',
                    'Cisgender Male' => 'Cisgender Male',
                    'FTM' => 'FTM',
                    'Gender Fluid' => 'Gender Fluid',
                    'Gender Nonconforming' => 'Gender Nonconforming',
                    'Gender Variant' => 'Gender Variant',
                    'Genderqueer' => 'Genderqueer',
                    'Intersex' => 'Intersex',
                    'MTF' => 'MTF',
                    'Neither' => 'Neither',
                    'Neutrois' => 'Neutrois',
                    'Non-Binary' => 'Non-Binary',
                    'Other' => 'Other',
                    'Pangender' => 'Pangender',
                    'Transgender' => 'Transgender',
                    'Transsexual Person' => 'Transsexual Person',
                    'Transmasculine' => 'Transmasculine',
                    'Transfeminine' => 'Transfeminine',
                    'Two-Spirit' => 'Two-Spirit'
                    ], 
                    null, ['class' => 'form-control' , 'placeholder' => 'Gender']) !!}
                </div>

                <div class="clearfix">
                    {!! Form::date('date_of_birth', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <h2>General Info</h2>
        <hr>
        {!! link_to_action('UserController@show', 'Cancel Edit', $user->id, ['class' => 'btn btn-danger pull-left', 'role' => 'button']) !!}
        {!! Form::submit('Save Changes', ['class' => 'btn btn-success pull-right']) !!}
        <br>

        <div class="page-header">
            <h4>Medical History
                <small>Information</small>
            </h4>

            <div class="panel panel-default">
                <div class="panel-body">


                    <div class="form-group row">
                        <div class="col-md-6">
                            {!! Form::label('has_diabetes', 'Have you been diagnosed with diabetes?', ['class' => '']) !!}
                        </div>
                        <div class="col-md-6">
                            Yes &nbsp; {!! Form::radio('has_diabetes', 1) !!}&nbsp; &nbsp; &nbsp;
                            No &nbsp; {!! Form::radio('has_diabetes', 0) !!}

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            {!! Form::label('has_migraines', 'Have you been diagnosed with migraines?', ['class' => '']) !!}
                        </div>
                        <div class="col-md-6">
                            Yes &nbsp; {!! Form::radio('has_migraines', 1) !!}&nbsp; &nbsp; &nbsp;
                            No &nbsp; {!! Form::radio('has_migraines', 0) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            {!! Form::label('has_glasses', 'Do you wear prescription glasses?', ['class' => '']) !!}
                        </div>
                        <div class="col-md-6">
                            Yes &nbsp; {!! Form::radio('has_glasses', 1) !!}&nbsp; &nbsp; &nbsp;
                            No &nbsp; {!! Form::radio('has_glasses', 0) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            {!! Form::label('last_eye_exam', 'When was your last eye exam?', ['class' => '']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::date('last_eye_exam', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
        {!! Form::close() !!}
        <div class="page-header clearfix">
            <h4>Triggers
                <small>Information</small>
            </h4>
            <div class="panel panel-default">
                <div class="panel-info form-padding-top">
                    <?php $triggers = $user->triggers; ?>
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
                    <?php $medicines = $user->medicines; ?>
                    @include('medicine.view')
                </div>
                <div class="panel-body">
                    @include('medicine.create')
                </div>
            </div>
        </div>
        {!! Form::submit('Save Changes', ['class' => 'btn btn-success pull-right']) !!}
    </div>
    {!! Form::close() !!}
@stop

