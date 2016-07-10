@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Hotel Room Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.hotels.template._left-nav')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Hotel Room Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                <br />
                <a href="{{ url('admin/hotels/hotel-room/create') }}"><i class="soap-icon-anchor circle"></i>New Hotel Room</a>
                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>All Categories</h2>


                        @if($action == 'c')
                            @include('errors.list')
                            {!! Form::open(['url'=>'admin/hotels/hotel-room']) !!}
                            @include('admin.hotels.template._form-hotel-room', ['SubmitButtonText' => 'Add Hotel Room'])
                            {!! Form::close() !!}
                        @elseif($action == 'e')
                            @include('errors.list')
                            {!! Form::model($hotelRoom,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'admin/hotels/hotel-room/'.$hotelRoom->id] ) !!}
                            @include('admin.hotels.template._form-hotel-room', ['SubmitButtonText' => 'Update Hotel Room'])
                            {!! Form::close() !!}
                        @endif

                        @foreach($hotelRooms as $hotelRoom)

                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-support takeoff-effect yellow-bg"></i>
                                <a href="#"><p class="all-user box-title pull-left">{{ $hotelRoom->room_type }}</p></a>
                                <div class="pull-right">
                                    <a href="{{ url('admin/hotels/hotel-room/'.$hotelRoom->id.'/edit')  }}" class="button btn-mini green">EDIT</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.hotels.room.destroy', $hotelRoom->id], 'class'=>'inline-block']) !!}
                                        <button
                                                class="btn-mini red"
                                                type="button"
                                                data-toggle="modal"
                                                data-target="#confirmDelete"
                                                data-title="Delete {{ $hotelRoom->room_type }} Room"
                                                data-message="Are you sure you want to delete this {{ $hotelRoom->room_type }} Room?"
                                                >
                                            <i class="glyphicon glyphicon-trash"></i> Delete
                                        </button>
                                        {!! Form::close() !!}
                                </div>
                                @include('common.delete-confirm')
                            </div>
                        @endforeach


                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection