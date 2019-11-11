<!-- Admin Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('admin_role', 'Admin Role:') !!}
    {!! Form::text('admin_role', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('adminRoles.index') !!}" class="btn btn-default">Cancel</a>
</div>
