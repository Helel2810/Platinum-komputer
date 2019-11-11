<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $deliveryOrder->id !!}</p>
</div>

<!-- Send Date Field -->
<div class="form-group">
    {!! Form::label('send_date', 'Send Date:') !!}
    <p>{!! $deliveryOrder->send_date !!}</p>
</div>

<!-- Receive Date Field -->
<div class="form-group">
    {!! Form::label('receive_date', 'Receive Date:') !!}
    <p>{!! $deliveryOrder->receive_date !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $deliveryOrder->status !!}</p>
</div>

<!-- Order Id Field -->
<div class="form-group">
    {!! Form::label('order_id', 'Order Id:') !!}
    <p>{!! $deliveryOrder->order_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $deliveryOrder->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $deliveryOrder->updated_at !!}</p>
</div>

