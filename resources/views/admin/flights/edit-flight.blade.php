@extends('admin.layout.admin')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Edit Flight Info'])
@stop

@section('admin-nav')
    @include('admin.flights._left-nav')
@endsection

@section('admin-content')
    <h2>Edit Flight: {{ $flight->title}} Flight Package</h2>
    @include('flash::message')

    @include('errors.list')

    {!! Form::model($flight,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'admin/flights/'.$flight->id] ) !!}
    @include('admin.flights._form', ['SubmitButtonText' => 'Update Flight', 'images'=>$flight->images])
    {!! Form::close() !!}



@endsection


