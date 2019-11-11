<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $address->id !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{!! $address->address !!}</p>
</div>

<!-- Recipient Name Field -->
<div class="form-group">
    {!! Form::label('recipient_name', 'Recipient Name:') !!}
    <p>{!! $address->recipient_name !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{!! $address->phone !!}</p>
</div>

<!-- Customer Id Field -->
<div class="form-group">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    <p>{!! $address->customer_id !!}</p>
</div>

<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('district_id', 'District Id:') !!}
    <p>{!! $address->district_id !!}</p>
</div>

<!-- Post Code Field -->
<div class="form-group">
    {!! Form::label('post_code', 'Post Code:') !!}
    <p>{!! $address->post_code !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $address->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $address->updated_at !!}</p>
</div>

