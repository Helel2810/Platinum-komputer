<div class="table-responsive">
    <table class="table" id="shippingCosts-table">
        <thead>
            <tr>
                <th>Price</th>
        <th>Shipping Method</th>
        <th>Courier</th>
        <th>District</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shippingCosts as $shippingCost)
            <tr>
                <td>{!! $shippingCost->price !!}</td>
            <td>{!! $shippingCost->shipmentMethod->name !!}</td>
            <td>{!! $shippingCost->courier->name !!}</td>
            <td>{!! $shippingCost->district->name !!}</td>
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
