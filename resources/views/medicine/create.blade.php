{!! Form::open(['action' =>'MedicineController@store', 'method' => 'post']) !!}
<h4>Add Medicine</h4>
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
    {!! Form::label('dose', 'Dose (mg):') !!}
    {!! Form::number('dose', null, ['class' => 'form-control']) !!}
</div>
<div class="text-right">
    {!! Form::submit('Add Medicine', ['class' => 'btn btn-info']) !!}
</div>
{!! Form::close() !!}