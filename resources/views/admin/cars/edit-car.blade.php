@extends('admin.layout.admin')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Edit Car Info'])
@stop

@section('admin-nav')
    @include('admin.cars._left-nav')
@endsection

@section('admin-content')
    <h2>Edit Car: {{ $car->title}} Car Package</h2>
    @include('flash::message')

    @include('errors.list')

    {!! Form::model($car,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'admin/cars/'.$car->id] ) !!}
    @include('admin.cars._form', ['SubmitButtonText' => 'Update Car', 'images'=>$car->images])
    {!! Form::close() !!}



@endsection


