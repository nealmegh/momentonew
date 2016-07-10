@extends('admin.layout.admin')


@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Add Car'])
@stop

@section('admin-nav')
    @include('admin.cars._left-nav')
@endsection

@section('admin-content')
    <h2>Add Car:</h2>
    @include('flash::message')

    @include('errors.list')
    {!! Form::open(['url'=>'admin/cars', 'files'=>'true']) !!}
       @include('admin.cars._form', ['SubmitButtonText' => 'Add Car', 'images'=>[]])
    {!! Form::close() !!}
@endsection


