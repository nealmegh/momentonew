@extends('admin.layout.admin')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Add Hotel'])
@stop

@section('admin-nav')
    @include('admin.hotels.template._left-nav')
@endsection

@section('admin-content')
    @include('flash::message')

    <h2>Add Hotel:</h2>
    @include('errors.list')
    {!! Form::open(['url'=>'admin/hotels', 'files'=>'true']) !!}
       @include('admin.hotels.template._form', ['SubmitButtonText' => 'Add Hotel', 'images'=>[], 'category' => ['0'], 'grade' => ['0'], 'pet' => ['0']])
    {!! Form::close() !!}
@endsection


