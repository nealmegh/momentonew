@extends('admin.layout.admin')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Add Tour'])
@stop

@section('admin-nav')
    @include('admin.tours._left-nav')
@endsection

@section('admin-content')
    <h2>Edit Tour: {{ $tour->title}} Tour Package</h2>
    @include('flash::message')

    @include('errors.list')

    {!! Form::model($tour,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'admin/tours/'.$tour->id] ) !!}
    @include('admin.tours._form', ['SubmitButtonText' => 'Update Tour'])
    {!! Form::close() !!}



@endsection


