<div class="table-responsive">
    <table class="table" id="productComments-table">
        <thead>
            <tr>
                <th>Stars</th>
        <th>Content</th>
        <th>Product Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productComments as $productComment)
            <tr>
                <td>{{ $productComment->stars }}</td>
            <td>{{ $productComment->content }}</td>
            <td>{{ $productComment->product_id }}</td>
                <td>
                    {!! Form::open(['route' => ['productComments.destroy', $productComment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productComments.show', [$productComment->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('productComments.edit', [$productComment->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
