<div class="table-responsive">
    <table class="table" id="deliveryOrders-table">
        <thead>
            <tr>
                <th>Send Date</th>
        <th>Receive Date</th>
        <th>Status</th>
        <th>Order Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($deliveryOrders as $deliveryOrder)
            <tr>
                <td>{!! $deliveryOrder->send_date !!}</td>
            <td>{!! $deliveryOrder->receive_date !!}</td>
            <td>{!! $deliveryOrder->status !!}</td>
            <td>{!! $deliveryOrder->order_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['deliveryOrders.destroy', $deliveryOrder->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('deliveryOrders.show', [$deliveryOrder->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
