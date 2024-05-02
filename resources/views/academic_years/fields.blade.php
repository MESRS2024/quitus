<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', __('models/academicYears.fields.id').':') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/academicYears.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Start is_active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', __('models/academicYears.fields.is_active').':') !!}
    {{ Form::select('is_active', [1 => 'Active', 0 => 'Inactive'], null, ['class' => 'form-control']) }}
</div>
