<!-- Name Form Input -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<!-- Description Form Input -->
<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'form-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<!-- Dose (mg) Form Input -->
<div class="form-group">
    {!! Form::label('dose', 'Dosage:') !!}
    {!! Form::text('dose', null, ['class' => 'form-control']) !!}
</div>
    </div>
    <div class='panel-footer'>
<div class="text-right">
    {!! Form::submit('Add Medicine', ['class' => 'btn btn-info']) !!}
</div>
{!! Form::close() !!}