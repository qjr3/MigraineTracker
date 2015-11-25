@extends('master')

@section('title')User Profile - Edit @stop

@section('footer')
    {!! Html::script('js/vue.min.js') !!}
    {!! Html::script('js/vue-resource.min.js') !!}
    {!! Html::script('js/vue/vue_profile_trigger.js') !!}
    {!! Html::script('js/vue/vue_profile_medicine.js') !!}
    <script>
        $.fn.bootstrapSwitch.defaults.onText = 'Yes';
        $.fn.bootstrapSwitch.defaults.onColor = 'success';
        $.fn.bootstrapSwitch.defaults.offText = 'No';
        $.fn.bootstrapSwitch.defaults.offColor = 'danger';
        $("[name='has_diabetes']").bootstrapSwitch();
        $("[name='has_migraines']").bootstrapSwitch();
        $("[name='has_glasses']").bootstrapSwitch();

    </script>
@stop


@section('content')
    <div class="col-md-12">
        <div class="row">

            {!!  Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PATCH']) !!}

            <div class="col-md-3">
                <div class='panel panel-info'>
                    <div class='panel-heading'>
                        <div class='panel-title text-center'>
                            <h2>Personal Info</h2>
                        </div>
                    </div>

                    <div class='panel-body'>
                        <div class="row text-center">
                            <span class="glyphicon glyphicon-user text-center" aria-hidden="true"
                                  style="font-size: 180px"></span>
                        </div>

                        <br/>

                        <div class="h4">

                            <p class="text-primary pull-left">Username:</p>

                            <div class="pull-right">{{ $user->name }}</div>

                        </div>
                        <div class="form-group">
                            {!! Form::label('first_name', 'First Name', ['class' => 'sr-only']) !!}
                            {!! Form::text('first_name', null,  ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('last_name', 'Last Name', ['class' => 'sr-only']) !!}
                            {!! Form::text('last_name', null,  ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email', ['class' => 'sr-only']) !!}
                            {!! Form::email('email', null,  ['class' => 'form-control', 'type' => 'email', 'placeholder' => 'Email']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::select('locale',
                            [
                            'en-US' => 'en-US'
                            // When we add more... like fr_FR or jp_JP or es_ES and es_MX
                            ],
                            null, ['class' => 'form-control' , 'placeholder' => 'Locale']) !!}
                        </div>

                        <div class="form-group">
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

                        <div class="form-group">
                            {!! Form::date('date_of_birth', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="clearfix">
                        <div class='col-xs-offset-1 col-xs-5 col-md-12 col-md-offset-0'>{!! Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) !!}
                            <br></div>
                        <div class='col-xs-5 col-md-12'>{!! link_to_action('UserController@show', 'Cancel', $user->id, ['class' => 'btn btn-danger btn-block', 'role' => 'button']) !!}</div>
                    </div>
                    <br>

                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">Advanced Settings</div>
                    <div class="panel-body">
                        <p>{!! link_to_action('UserController@settings', 'Manage your settings', $user->id) !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>Medical History</h4>
                    </div>
                    <div class="panel-body">


                        <div class="form-group row">
                            <div class="col-xs-6">
                                {!! Form::label('has_diabetes', 'Have you been diagnosed with diabetes?', ['class' => 'form-label']) !!}
                            </div>
                            <div class="col-xs-6">
                                {!! Form::checkbox('has_diabetes') !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-xs-6">
                                {!! Form::label('has_migraines', 'Have you been diagnosed with migraines?', ['class' => 'form-label']) !!}
                            </div>
                            <div class="col-xs-6">
                                {!! Form::checkbox('has_migraines') !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                {!! Form::label('has_glasses', 'Do you wear prescription glasses?', ['class' => 'form-label']) !!}
                            </div>
                            <div class="col-xs-6">
                                {!! Form::checkbox('has_glasses') !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-xs-6">
                                {!! Form::label('last_eye_exam', 'When was your last eye exam?', ['class' => 'form-label']) !!}
                            </div>
                            <div class="col-xs-6">
                                {!! Form::date('last_eye_exam', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-xs-offset-1 col-xs-5'>{!! Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) !!}</div>
                        <div class='col-xs-5'>{!! link_to_action('UserController@show', 'Cancel', $user->id, ['class' => 'btn btn-danger btn-block', 'role' => 'button']) !!}</div>
                    </div>
                    <br/>
                </div>
            </div>


            {!! Form::close() !!}


            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading ">
                        <h4>Triggers</h4>
                    </div>
                    <div class="panel-body ">
                        <div id="triggers">
                            {!! Form::open(array('id' => 'trigger-form', 'method' => 'POST', '@submit.prevent' => 'onSubmit')) !!}

                            <div class="row">
                                <div class="col-md-4 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('name' , 'Name', array('class' => 'sr-only')) !!}
                                        {!! Form::text('name' , null, array('class' => 'form-control', 'placeholder' => 'Enter Name', 'id' => 'name', 'v-model' => 'newTrigger.name')) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('description' , 'Description', array('class' => 'sr-only')) !!}
                                        {!! Form::text('description' , null, array('class' => 'form-control', 'placeholder' => 'Enter Description', 'id' => 'description', 'v-model' => 'newTrigger.description')) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default btn-block"
                                                v-bind="{disabled: false}">Add
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {!! Form::close() !!}

                                    <!-- Replace with partial trigger.p_index -->
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Trigger Name</th>
                                    <th>Description</th>
                                    <th># of Occurrences</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="trigger in triggers | limitBy 5">
                                    <td>@{{ trigger.name }}</td>
                                    <td>@{{ trigger.description }}</td>
                                    <td>0</td>
                                    <td>
                                        <button type="submit" class="btn btn-danger btn-xs"
                                                v-on:click.stop.prevent="delete($index)">X
                                        </button>
                                    </td>
                                </tr>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>Medications</h4>
                    </div>
                    <div class="panel-body">
                        <div id="medicines">
                            {!! Form::open(array('id' => 'medicine-form', 'method' => 'POST', '@submit.prevent' => 'onSubmit')) !!}

                            {!! Form::hidden('user_id', $user->id) !!}

                            <div class="row">
                                <div class="col-md-4 col-xs-4">
                                    <div class="form-group">
                                        {!! Form::label('name' , 'Name', array('class' => 'sr-only')) !!}
                                        {!! Form::text('name' , null, array('class' => 'form-control', 'placeholder' => 'Enter Name', 'id' => 'name', 'v-model' => 'newMedicine.name')) !!}
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-5">
                                    <div class="form-group">
                                        {!! Form::label('description' , 'Description', array('class' => 'sr-only')) !!}
                                        {!! Form::text('description' , null, array('class' => 'form-control', 'placeholder' => 'Enter Description', 'id' => 'description', 'v-model' => 'newMedicine.description')) !!}
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-3">
                                    <div class="form-group">
                                        {!! Form::label('dose' , 'Dosage', array('class' => 'sr-only')) !!}
                                        {!! Form::text('dose' , null, array('class' => 'form-control', 'placeholder' => 'Dosage', 'id' => 'description', 'v-model' => 'newMedicine.dose')) !!}
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default btn-block"
                                                v-bind="{disabled: false}">Add
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {!! Form::close() !!}


                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Trigger Name</th>
                                    <th>Description</th>
                                    <th>Dosage</th>
                                    <th># of Occurrences</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="medicine in medicines  | limitBy 5">
                                    <td>@{{ medicine.name }}</td>
                                    <td>@{{ medicine.description }}</td>
                                    <td>@{{ medicine.dose }}</td>
                                    <td>0</td>
                                    <td>
                                        <button type="submit" class="btn btn-danger btn-xs"
                                                v-on:click.stop.prevent="delete($index)">X
                                        </button>
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                {!! Form::open(array('action' => array('UserController@destroy', $user->id), 'method' => 'DELETE')) !!}

                {!! Form::submit('Delete Account', array('class' => 'btn btn-danger btn-lg btn-block')) !!}
                {!! Form::close() !!}
            </div>


        </div>
    </div>
@stop
