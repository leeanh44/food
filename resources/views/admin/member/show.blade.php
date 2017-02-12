@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ trans('member.detail_member') }}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @include('admin.member.show_fields')
                    <a href="{!! route('member.index') !!}" class="btn btn-default">{{ trans('label.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
