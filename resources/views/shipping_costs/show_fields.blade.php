<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $shippingCost->id !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{!! $shippingCost->price !!}</p>
</div>

<!-- Shipping Method Id Field -->
<div class="form-group">
    {!! Form::label('shipping_method_id', 'Shipping Method Id:') !!}
    <p>{!! $shippingCost->shipping_method_id !!}</p>
</div>

<!-- Courier Id Field -->
<div class="form-group">
    {!! Form::label('courier_id', 'Courier Id:') !!}
    <p>{!! $shippingCost->courier_id !!}</p>
</div>

<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('district_id', 'District Id:') !!}
    <p>{!! $shippingCost->district_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $shippingCost->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $shippingCost->updated_at !!}</p>
</div>

