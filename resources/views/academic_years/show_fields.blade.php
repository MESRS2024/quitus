<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/academicYears.fields.id').':') !!}
    <p>{{ $academicYear->id }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/academicYears.fields.description').':') !!}
    <p>{{ $academicYear->description }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/academicYears.fields.created_at').':') !!}
    <p>{{ $academicYear->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/academicYears.fields.updated_at').':') !!}
    <p>{{ $academicYear->updated_at }}</p>
</div>

