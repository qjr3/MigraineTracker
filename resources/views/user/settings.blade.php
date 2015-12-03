@extends('master')

@section('footer')
    <script>
        $.fn.bootstrapSwitch.defaults.onText = 'Yes';
        $.fn.bootstrapSwitch.defaults.onColor = 'success';
        $.fn.bootstrapSwitch.defaults.offText = 'No';
        $.fn.bootstrapSwitch.defaults.offColor = 'danger';
        $("[name='enable_nag']").bootstrapSwitch();
    </script>
@stop

@section('content')
    <div class="col-md-12">
        <div class="row">

            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <div class='panel-title text-center'>
                        <h2>Settings</h2>
                    </div>
                </div>

                <div class='panel-body'>

                    {!! Form::open() !!}
                    <div class="form-group row">
                        <div class="col-sm-6">
                            {!! Form::label('enable_nag', 'Would you like to be notified of incoming migraines?', ['class' => 'form-label']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::checkbox('enable_nag') !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            {!! Form::label('theme', 'Change theme (disabled)', ['class' => 'form-label']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::checkbox('enable_nag') !!}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-xs-offset-1 col-xs-5'>{!! Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) !!}</div>
                        <div class='col-xs-5'>{!! link_to_action('UserController@show', 'Cancel', $user->id, ['class' => 'btn btn-danger btn-block', 'role' => 'button']) !!}</div>
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>
        </div>


@stop