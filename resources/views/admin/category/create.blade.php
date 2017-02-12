@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ trans('category.category') }}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'category.store', 'files' => true]) !!}

                        @include('admin.category.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
