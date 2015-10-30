{!! Form::open(['action' =>'TriggerController@store', 'method' => 'post']) !!}
<h4>Add Trigger</h4>
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
<div class="text-right">
    {!! Form::submit('Add Trigger', ['class' => 'btn btn-info']) !!}
</div>
{!! Form::close() !!}