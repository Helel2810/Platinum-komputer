<div class="table-responsive">
    <table class="table" id="purchaseInvoices-table">
        <thead>
            <tr>
                <th>Status</th>
        <th>Supplier Id</th>
        <th>Product Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($purchaseInvoices as $purchaseInvoice)
            <tr>
                <td>{!! $purchaseInvoice->status !!}</td>
            <td>{!! $purchaseInvoice->supplier_id !!}</td>
            <td>{!! $purchaseInvoice->product_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['purchaseInvoices.destroy', $purchaseInvoice->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('purchaseInvoices.show', [$purchaseInvoice->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('purchaseInvoices.edit', [$purchaseInvoice->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
