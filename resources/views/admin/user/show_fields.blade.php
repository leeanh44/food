<div class="form-group col-sm-6">
    {!! Form::label('id', trans('user.id')) !!}
    <p>{!! $user['id'] !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', trans('user.name')) !!}
    <p>{!! $user['name'] !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('email', trans('user.email')) !!}
    <p>{!! $user['email'] !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('admin', trans('user.admin')) !!}
    <p>{!! $user['admin'] === 0 ? 'User' : 'Admin' !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('avatar', trans('user.avatar')) !!}
    @if($user->avatar === NULL)
        <img src="{{ Request::root() }}/uploads/pictures/default.png" width="80px" height="120px">
    @else
        <img src="{{ Request::root() }}/uploads/avatars/{!! $user->avatar !!}" width="80px" height="80px">
    @endif
</div>

<div class="form-group">
    {!! Form::label('created_at', trans('label.created_at')) !!}
    <p>{!! $user['created_at'] !!}</p>
</div>

<div class="form-group">
    {!! Form::label('updated_at', trans('label.updated_at')) !!}
    <p>{!! $user['updated_at'] !!}</p>
</div>

