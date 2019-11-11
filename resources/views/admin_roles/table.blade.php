<div class="table-responsive">
    <table class="table" id="adminRoles-table">
        <thead>
            <tr>
                <th>Admin Role</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($adminRoles as $adminRole)
            <tr>
                <td>{!! $adminRole->admin_role !!}</td>
                <td>
                    {!! Form::open(['route' => ['adminRoles.destroy', $adminRole->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('adminRoles.show', [$adminRole->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('adminRoles.edit', [$adminRole->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
