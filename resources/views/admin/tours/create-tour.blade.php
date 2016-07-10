@extends('admin.layout.admin')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Add Tour'])
@stop

@section('admin-nav')
    @include('admin.tours._left-nav')
@endsection

@section('admin-content')

    <h2>Add Tour:</h2>
    @include('flash::message')

    @include('errors.list')
    {!! Form::open(['url'=>'admin/tours', 'files'=>'true']) !!}
       @include('admin.tours._form', ['SubmitButtonText' => 'Add Tour', 'images'=>[], 'category' => ['0'], 'grade' => ['0'], 'pet' => ['0']])
    {!! Form::close() !!}
@endsection


