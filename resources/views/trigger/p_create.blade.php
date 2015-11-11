<div class='panel-body'>

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
    </div>
    <div class='panel-footer'>
        <div class="text-center">
            {!! Form::submit('Add Trigger', ['class' => 'btn btn-primary btn-default']) !!}
        </div>
    </div>