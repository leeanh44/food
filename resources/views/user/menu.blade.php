<ul>
@foreach($categoriesMenus as $category)
    <li><a href="{{ url('user/book') }}/category/{{ $category->id }}">{{ $category->name }}</a></li>
@endforeach
</ul>