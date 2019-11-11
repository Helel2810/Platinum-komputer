<div class="table-responsive">
    <table class="table" id="couriers-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Phone</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($couriers as $courier)
            <tr>
                <td>{!! $courier->name !!}</td>
            <td>{!! $courier->phone !!}</td>
                <td>
                    {!! Form::open(['route' => ['couriers.destroy', $courier->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('couriers.show', [$courier->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('couriers.edit', [$courier->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
