@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

    {!! Form::hidden('user_id', null, ['class' => 'form-control']) !!}

<div class="form-group col-sm-6">
    {!! Form::label('fullname', trans('member.fullname')) !!}
    {!! Form::text('fullname', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('avatar', trans('member.avatar'), array('class' => 'col-md-3 control-label')) !!}
    <img src="{{ Request::root() }}/uploads/pictures/default.png" id="output" style="width:100px;height:100px;display:block; padding-top: 10px;">
    {!! Form::file('avatar', array('onchange' => 'loadFile(event)') ) !!}
</div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<div class="clearfix"></div>

<div class="form-group col-sm-6">
    {!! Form::label('gender', trans('member.gender')) !!}
    {!! Form::text('gender', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('phone', trans('member.phone')) !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('address', trans('member.address')) !!}
    {!! Form::text('address',null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit(trans('label.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('member.index') !!}" class="btn btn-default">{{ trans('label.back') }}</a>
</div>
