@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ trans('member.edit_member') }}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {{ Form::model($member, array('route' => array('member.update', $member['id']), 'method' => 'PUT', 'files' => true)) }}

                        @include('admin.member.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
