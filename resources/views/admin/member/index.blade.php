@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{{ trans('member.list_member') }}</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" href="{!! route('member.create') !!}">{{ trans('member.add_member') }}</a>
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
                @include('admin.member.table')
            </div>
        </div>
        {!! $members->render(); !!}
    </div>
@endsection

