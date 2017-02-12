@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{{ trans('category.list_category') }}</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" href="{!! route('category.create') !!}">{{ trans('category.add_category') }}</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
            @if(Session::has('msg'))
                <div class="alert alert-success">
                    {{ Session::get('msg') }}
                </div>
            @endif
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.category.table')
            </div>
        </div>
        {!! $categories->render(); !!}
    </div>
@endsection

