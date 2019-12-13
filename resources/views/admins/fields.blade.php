<!-- User Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_name', 'User Name:') !!}
    {!! Form::text('user_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['active' => 'active', 'inactive' => 'inactive'], null, ['class' => 'form-control']) !!}
</div>

<!-- Admin Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('admin_role_id', 'Admin Role Id:') !!}
    {!! Form::select('admin_role_id', $admin_roles, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admins.index') !!}" class="btn btn-default">Cancel</a>
</div>
