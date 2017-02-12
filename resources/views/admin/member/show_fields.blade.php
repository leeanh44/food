<div class="form-group col-sm-6">
    {!! Form::label('id', trans('member.id')) !!}
    <p>{!! $member['id'] !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('fullname', trans('member.fullname')) !!}
    <p>{!! $member['fullname'] !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('gender', trans('member.gender')) !!}
    <p>{!! $member['gender'] !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('phone', trans('member.phone')) !!}
    <p>{!! $member['phone'] !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('address', trans('member.address')) !!}
    <p>{!! $member['address'] !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('avatar', trans('member.avatar')) !!}
    @if($member->avatar === NULL)
        <img src="{{ Request::root() }}/uploads/pictures/default.png" width="80px" height="120px">
    @else
        <img src="{{ Request::root() }}/uploads/avatars/{!! $member->avatar !!}" width="80px" height="80px">
    @endif
</div>

<div class="form-group">
    {!! Form::label('created_at', trans('member.created_at')) !!}
    <p>{!! $member['created_at'] !!}</p>
</div>

<div class="form-group">
    {!! Form::label('updated_at', trans('member.updated_at')) !!}
    <p>{!! $member['updated_at'] !!}</p>
</div>

