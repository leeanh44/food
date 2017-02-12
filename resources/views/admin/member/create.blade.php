@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ trans('member.member') }}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row col-md-offset-1">
                    {!! Form::open(['route' => 'member.store', 'files' => true]) !!}

                        @include('admin.member.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
