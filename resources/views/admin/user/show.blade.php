@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ trans('user.detail_user') }}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row col-md-offset-1">
                    @include('admin.user.show_fields')
                    <a href="{!! route('user.index') !!}" class="btn btn-default">{{ trans('label.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
