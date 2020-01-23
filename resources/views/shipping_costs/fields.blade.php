<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Shipping Method Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shipment_method_id', 'Shipment Method Id:') !!}
    {!! Form::select('shipment_method_id', $shipmentMethod, null, ['class' => 'form-control']) !!}
</div>

<!-- Courier Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('courier_id', 'Courier Id:') !!}
    {!! Form::select('courier_id', $courier, null, ['class' => 'form-control']) !!}
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'District Id:') !!}
    {!! Form::select('district_id', $district, null, ['class' => 'form-control select2form']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('shippingCosts.index') !!}" class="btn btn-default">Cancel</a>
</div>
