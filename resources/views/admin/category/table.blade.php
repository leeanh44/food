<style type="text/css">
    thead {
        background-color: #4CAF50;
        color: #fff;
    }
    tr:nth-child(even) {background-color: #f2f2f2}
</style>
<table class="table table-responsive" id="category-table">
    <thead>
        <th>{{ trans('category.id') }}</th>
        <th>{{ trans('category.name') }}</th>
        <th>{{ trans('category.description') }}</th>
        <th>{{ trans('label.action') }}</th>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                {!! Form::open(['route' => ['category.destroy', $category->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('category.show', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('category.edit', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
