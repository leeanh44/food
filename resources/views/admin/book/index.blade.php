@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{{ trans('book.list_book') }}</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" href="{!! route('book.create') !!}">{{ trans('book.add_book') }}</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
            @include('admin.layouts.partials.success')
            @include('admin.layouts.partials.errors')
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.book.table')
            </div>
        </div>
        {!! $books->render(); !!}
    </div>
@endsection

