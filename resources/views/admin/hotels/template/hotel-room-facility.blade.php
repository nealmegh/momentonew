@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Facility Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">

        @include('admin.hotels.template._left-nav')

        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Room Type Facility Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>

                @include('flash::message')

                <a href="{{ url('admin/hotels/facility/create') }}" class="button btn-small sky-blue1">Create New Facility</a>
                <hr />

                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>{{ $roomType->hotel->name }} - {{ $roomType->room_type }} Facilities</h2>



                                @include('errors.list')
                                {!! Form::open(['url'=>'admin/hotels/hotel-room-facility']) !!}
                                    {!! form::hidden('hotel_room_group_id', $roomType->id) !!}
                                        <div class="form-group font14">
                                            <ul class="clearfix">
                                                @foreach($facilityTypes as $facilityType)

                                                    @if($facilityType->roomTypes()->where('hotel_room_group_id', '=', $roomType->id)->count() > 0 )
                                                        <li  class="col-sm-6 col-md-3">
                                                            <label class="checkbox-inline">
                                                                {!! form::checkbox('facility_type_id[]', $facilityType->id, true ) !!} {{ $facilityType->name }}
                                                            </label>
                                                        </li>
                                                    @else
                                                        <li class="col-sm-6 col-md-3">
                                                            <label class="checkbox-inline">
                                                                {!! form::checkbox('facility_type_id[]', $facilityType->id ) !!} {{ $facilityType->name }}
                                                            </label>
                                                        </li>
                                                    @endif

                                                @endforeach
                                            </ul>
                                        </div>

                                <div class="form-group">
                                    <button type="submit" class="btn-medium full-width">Add Facility</button>
                                </div>

                                {!! Form::close() !!}



                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection