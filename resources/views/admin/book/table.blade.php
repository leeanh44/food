<style type="text/css">
    thead {
        background-color: #4CAF50;
        color: #fff;
    }
    tr:nth-child(even) {background-color: #f2f2f2}
</style>
<table class="table table-responsive" id="book-table">
    <thead>
        <th>{{ trans('book.id') }}</th>
        <th>{{ trans('book.member') }}</th>
        <th>{{ trans('book.category') }}</th>
        <th>{{ trans('book.name') }}</th>
        <th>{{ trans('book.picture') }}</th>
        <th>{{ trans('book.author') }}</th>
        <th>{{ trans('book.price') }}</th>
        <th>{{ trans('book.overview') }}</th>
        <th>{{ trans('book.contact') }}</th>
        <th>{{ trans('book.status') }}</th>
        <th>{{ trans('label.action') }}</th>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>
            @if($book->member === NULL)
                    <p>AT</p>
                @else
                    <p>{{ $book->member->fullname }}</p>
            @endif
            </td>
            <td>
            @if($book->category === NULL)
                    <p>Nothing</p>
                @else
                    <p>{{ $book->category->name }}</p>
            @endif
            </td>
            <td>{{ $book->name }}</td>
            <td>
                @if($book->picture === NULL)
                        <img src="{{ Request::root() }}/uploads/pictures/default.png" width="80px" height="120px">
                @else
                    <img src="{{ Request::root() }}/uploads/pictures/{{ $book->picture }}" width="80px" height="120px">
                @endif
            </td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->price }}</td>
            <td>{{ $book->overview }}</td>
            <td>{{ $book->contact }}</td>
            <td>
                @if($book->status === 1)
                    <a href="{{ route('update_status', ['id' => $book->id, 'status' => 0]) }}" class="label label-success userStatus" id="{{$book->id}}"><button id="button"><i style="color:green" class="glyphicon glyphicon-ok"></i></button></a>
                @else
                    <a href="{{ route('update_status', ['id' => $book->id, 'status' => 1]) }}" class="label label-danger userStatus" id="{{$book->id}}"><button id="button"><i style="color:red" class="glyphicon glyphicon-remove"></i></button></a>
                @endif
            </td>
            <td>
                {!! Form::open(['route' => ['book.destroy', $book->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('book.show', [$book->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('book.edit', [$book->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
