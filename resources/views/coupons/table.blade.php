<div class="table-responsive">
    <table class="table" id="coupons-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Nominal</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($coupons as $coupon)
            <tr>
                <td>{!! $coupon->name !!}</td>
            <td>{!! $coupon->nominal !!}</td>
            <td>{!! $coupon->start_date !!}</td>
            <td>{!! $coupon->end_date !!}</td>
            <td>{!! $coupon->status !!}</td>
                <td>
                    {!! Form::open(['route' => ['coupons.destroy', $coupon->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('coupons.show', [$coupon->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('coupons.edit', [$coupon->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
