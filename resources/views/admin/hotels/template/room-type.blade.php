@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Room Type Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.hotels.template._left-nav')

        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Room Type Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                @include('flash::message')

                @if($action == 'v')
                    <a href="{{ url('admin/hotels/manage') }}" class="button btn-small ">Back</a>
                    <a href="{{ url('admin/hotels/room-type/create?hotel='.$hotel->id) }}" class="button btn-small sky-blue1">Add New Room Group</a>
                @endif
                <hr />


                <div class="row block">
                    <div class="col-md-12 notifications">

                        @if($action == 'c')
                            @include('errors.list')
                            {!! Form::open(['url'=>'admin/hotels/room-type']) !!}
                            @include('admin.hotels.template._form-room-type', ['SubmitButtonText' => 'Add Room Type'])
                            {!! Form::close() !!}
                        @endif

                        @if($action == 'e')
                            @include('errors.list')
                            {!! Form::model($roomType,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'admin/hotels/room-type/'.$roomType->id] ) !!}
                            @include('admin.hotels.template._form-room-type', ['SubmitButtonText' => 'Update Room Type'])
                            {!! Form::close() !!}
                        @endif

                        @if($action == 'v')

                        <h2>{{ $hotel->name }} Room Type</h2>
                            @foreach($roomTypes as $roomType)

                                <div class="icon-box style1 fourty-space">
                                    <i class="soap-icon-support takeoff-effect yellow-bg"></i>
                                    <a href="#"><p class="all-user box-title pull-left">{{ $roomType->hotel->name }} - {{ $roomType->room_type }}</p></a>
                                    @foreach( $roomType->facilities as $facilities)
                                        @if($facility = $facilities->facilityTitle)
                                             <span>{{ $facility->name }},</span>
                                        @endif
                                    @endforeach
                                    <div class="pull-right">
                                        <a href="{{ url('admin/hotels/hotel-room-facility?hotel_room_group_id='.$roomType->id)  }}"class="button btn-mini green">Facility</a>
                                        <a href="{{ url('admin/hotels/vacancy?hotel='.$hotel->id.'&amp;roomType='.$roomType->id)  }}" class="button btn-mini green">ROOM VACANCY</a>
                                        <a href="{{ url('admin/hotels/room-type/'.$roomType->id.'/edit?hotel='.$hotel->id)  }}" class="button btn-mini green">EDIT</a>
                                        <a class="button btn-mini red">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.hotels.room-type.destroy', $roomType->id]]) !!}
                                            <button
                                                    class="btn-mini red"
                                                    type="button"
                                                    data-toggle="modal"
                                                    data-target="#confirmDelete"
                                                    data-title="Delete {{ $roomType->room_type }} Room Type"
                                                    data-message="Are you sure you want to delete this {{ $roomType->room_type }} Room Type?"
                                                    >
                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                            </button>
                                            {!! Form::close() !!}
                                            @include('common.delete-confirm')
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection