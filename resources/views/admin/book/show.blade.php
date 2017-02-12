@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ trans('book.detail_book') }}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row col-md-offset-1">
                    @include('admin.book.show_fields')
                    <a href="{!! route('book.index') !!}" class="btn btn-default">{{ trans('book.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
