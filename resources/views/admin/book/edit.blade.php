@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ trans('book.edit_book') }}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {{ Form::model($book, array('route' => array('book.update', $book['id']), 'method' => 'PUT', 'files' => true)) }}

                        @include('admin.book.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
