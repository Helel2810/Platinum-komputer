<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $adminRole->id !!}</p>
</div>

<!-- Admin Role Field -->
<div class="form-group">
    {!! Form::label('admin_role', 'Admin Role:') !!}
    <p>{!! $adminRole->admin_role !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $adminRole->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $adminRole->updated_at !!}</p>
</div>

