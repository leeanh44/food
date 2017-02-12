@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ trans('book.book') }}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'book.store', 'files' => true]) !!}

                        @include('admin.book.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
