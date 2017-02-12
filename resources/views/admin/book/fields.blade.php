@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

    {!! Form::hidden('member_id', Auth::user()->id, ['class' => 'form-control']) !!}

<div class="form-group col-md-offset-2">
    {!! Form::label('avatar', trans('book.picture'), array('class' => 'col-md-4 control-label')) !!}
    {!! Form::image(Auth::user()->avatar, 'btnSub', array('class' => 'img', 'id' => 'output', 'style' => 'width:150px;height:200px;display:block;')) !!}
    {!! Form::file('picture', array('onchange' => 'loadFile(event)', 'class' => 'col-md-12 col-md-offset-3 control-label') ) !!}
    
</div>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

<div class="form-group col-sm-6">
    {!! Form::label('category_id', trans('book.category_id')) !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', trans('book.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="clearfix"></div>

<div class="form-group col-sm-6">
    {!! Form::label('author', trans('book.author')) !!}
    {!! Form::text('author', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('price', trans('book.price')) !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('overview', trans('book.overview')) !!}
    {!! Form::textarea('overview', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('contact', trans('book.contact')) !!}
    {!! Form::text('contact', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit(trans('label.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('book.index') !!}" class="btn btn-default">{{ trans('label.back') }}</a>
</div>
