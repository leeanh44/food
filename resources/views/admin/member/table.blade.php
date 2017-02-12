<style type="text/css">
    thead {
        background-color: #4CAF50;
        color: #fff;
    }
    tr:nth-child(even) {background-color: #f2f2f2}
</style>
<table class="table table-responsive" id="member-table">
    <thead>
        <th>{{ trans('member.id') }}</th>
        <th>{{ trans('member.fullname') }}</th>
        <th>{{ trans('member.avatar') }}</th>
        <th>{{ trans('member.gender') }}</th>
        <th>{{ trans('member.phone') }}</th>
        <th>{{ trans('member.address') }}</th>
        <th>{{ trans('label.action') }}</th>
    </thead>
    <tbody>
    @foreach($members as $member)
        <tr>
            <td>{{ $member->id }}</td>
            <td>{{ $member->fullname }}</td>
            <td>
                @if($member->avatar === NULL)
                        <img src="{{ Request::root() }}/uploads/pictures/default.png" width="80px" height="120px">
                @else
                    <img src="{{ Request::root() }}/uploads/avatars/{!! $member->avatar !!}" width="80px" height="80px">
                @endif
            <td>{{ $member->gender }}</td>
            <td>{{ $member->phone }}</td>
            <td>{{ $member->address }} </td>
            <td>
                {!! Form::open(['route' => ['member.destroy', $member->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('member.show', [$member->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('member.edit', [$member->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
