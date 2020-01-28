<div class="table-responsive">
    <table class="table" id="shippingCosts-table">
        <thead>
            <tr>
                <th>Price</th>
        <th>Shipping Method Id</th>
        <th>Courier Id</th>
        <th>District Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shippingCosts as $shippingCost)
            <tr>
                <td>{!! $shippingCost->price !!}</td>
            <td>{!! $shippingCost->shipment_method_id !!}</td>
            <td>{!! $shippingCost->courier_id !!}</td>
            <td>{!! $shippingCost->district_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['shippingCosts.destroy', $shippingCost->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('shippingCosts.show', [$shippingCost->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('shippingCosts.edit', [$shippingCost->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
