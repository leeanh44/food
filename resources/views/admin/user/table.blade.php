<style type="text/css">
    thead {
        background-color: #4CAF50;
        color: #fff;
    }
    tr:nth-child(even) {background-color: #f2f2f2}
</style>
<table class="table table-responsive" id="users-table">
    <thead>
        <th>{{ trans('user.name') }}</th>
        <th>{{ trans('user.email') }}</th>
        <th>{{ trans('user.admin') }}</th>
        <th>{{ trans('user.avatar') }}</th>
        <th>{{ trans('label.action') }}</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->admin === 0 ? "User" : "Admin" }} </td>
            <td>
                @if($user->avatar === NULL)
                        <img src="{{ Request::root() }}/uploads/pictures/default.png" width="80px" height="100px">
                @else
                    <img src="{!! $user->avatar !!}" width="80px" height="100px">
                @endif
            <td>
                {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('user.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('user.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
