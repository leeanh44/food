@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ trans('category.detail_category') }}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @include('admin.category.show_fields')
                    <a href="{!! route('category.index') !!}" class="btn btn-default">{{ trans('category.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
