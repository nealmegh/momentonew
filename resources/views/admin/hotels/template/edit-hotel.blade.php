@extends('admin.layout.admin')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Add Hotel'])
@stop

@section('admin-nav')
    @include('admin.hotels.template._left-nav')
@endsection

@section('admin-content')
    <h2>Edit Hotel: {{ $hotel->name}}</h2>

    {!! Form::model($hotel,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'admin/hotels/'.$hotel->id] ) !!}
    @include('admin.hotels.template._form', ['SubmitButtonText' => 'Update Hotel', 'images'=>$hotel->images()->where('type', '=', 'logo')->get(), 'category' => $hotel->category_id, 'grade' => $hotel->grade_id, 'facility_type'=> $hotel_facility, 'pet' => $hotel->pet_allowed])
    {!! Form::close() !!}

    @include('errors.list')


@endsection


