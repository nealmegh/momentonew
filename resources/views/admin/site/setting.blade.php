@extends('admin.layout.admin')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Add Hotel'])
@stop

@section('admin-nav')
    <ul class="tabs">
        <li class="active "><a href="#"><i class="soap-icon-settings circle"></i>Global Setting</a></li>
    </ul>
@endsection

@section('admin-content')
    <h2>Add Global Setting:</h2>

    {!! Form::model($globalConfiguration, ['method'=>'patch','url'=>'admin/site', 'files'=>'true']) !!}
    @include('admin.site._form-global-setting')
    {!! Form::close() !!}
@endsection

