@extends('admin.layout.admin')


@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Add Flight'])
@stop

@section('admin-nav')
    @include('admin.flights._left-nav')
@endsection

@section('admin-content')
    <h2>Add Flight:</h2>
    @include('flash::message')

    @include('errors.list')
    {!! Form::open(['url'=>'admin/flights', 'files'=>'true']) !!}
       @include('admin.flights._form', ['SubmitButtonText' => 'Add Flight', 'images'=>[]])
    {!! Form::close() !!}
@endsection


