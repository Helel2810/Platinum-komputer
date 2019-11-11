<!-- Send Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('send_date', 'Send Date:') !!}
    {!! Form::date('send_date', null, ['class' => 'form-control','id'=>'send_date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#send_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Receive Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('receive_date', 'Receive Date:') !!}
    {!! Form::date('receive_date', null, ['class' => 'form-control','id'=>'receive_date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#receive_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['a' => 'a', 'b' => 'b', 'c' => 'c'], null, ['class' => 'form-control']) !!}
</div>

<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::select('order_id', ['a' => 'a', 'b' => 'b', 'c' => 'c'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('deliveryOrders.index') !!}" class="btn btn-default">Cancel</a>
</div>
