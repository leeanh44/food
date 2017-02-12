@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ trans('category.edit_category') }}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {{ Form::model($category, array('route' => array('category.update', $category['id']), 'method' => 'PUT', 'files' => true)) }}

                        @include('admin.category.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
