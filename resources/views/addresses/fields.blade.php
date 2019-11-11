<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Recipient Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recipient_name', 'Recipient Name:') !!}
    {!! Form::text('recipient_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    {!! Form::select('customer_id', ['a' => 'a', 'b' => 'b', 'c' => 'c'], null, ['class' => 'form-control']) !!}
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'District Id:') !!}
    {!! Form::select('district_id', ['a' => 'a', 'b' => 'b', 'c' => 'c'], null, ['class' => 'form-control']) !!}
</div>

<!-- Post Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post_code', 'Post Code:') !!}
    {!! Form::text('post_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('addresses.index') !!}" class="btn btn-default">Cancel</a>
</div>
