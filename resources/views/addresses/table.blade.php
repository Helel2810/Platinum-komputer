<div class="table-responsive">
    <table class="table" id="addresses-table">
        <thead>
            <tr>
                <th>Address</th>
        <th>Recipient Name</th>
        <th>Phone</th>
        <th>Customer Id</th>
        <th>Post Code</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($addresses as $address)
            <tr>
                <td>{!! $address->address !!}</td>
            <td>{!! $address->recipient_name !!}</td>
            <td>{!! $address->phone !!}</td>
            <td>{!! $address->customer_id !!}</td>
            <td>{!! $address->post_code !!}</td>
                <td>
                    {!! Form::open(['route' => ['addresses.destroy', $address->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('addresses.show', [$address->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('addresses.edit', [$address->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
