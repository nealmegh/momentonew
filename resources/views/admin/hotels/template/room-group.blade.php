@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Room Type Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">

        @include('admin.hotels.template._left-nav')

        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Room Group Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                <br />
                @include('flash::message')

                <a href="{{ url('admin/hotels/room-type/create') }}" class="button btn-small sky-blue1">New Room Group</a>
                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>All Categories</h2>


                        @if($action == 'c')
                            @include('errors.list')
                            {!! Form::open(['url'=>'admin/hotels/room-type']) !!}
                            @include('admin.hotels.template._form-room-type', ['SubmitButtonText' => 'Add Room Type'])
                            {!! Form::close() !!}
                        @elseif($action == 'e')
                            @include('errors.list')
                            {!! Form::model($roomGroup,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'admin/hotels/room-type/'.$roomGroup->id] ) !!}
                            @include('admin.hotels.template._form-room-type', ['SubmitButtonText' => 'Update Room Type'])
                            {!! Form::close() !!}
                        @endif

                        @foreach($roomGroups as $roomGroup)

                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-support takeoff-effect yellow-bg"></i>
                                <a href="#"><p class="all-user box-title pull-left">{{ $roomGroup->room_type }}</p></a>
                                <div class="pull-right">
                                    <a href="{{ url('admin/hotels/room-type/'.$roomGroup->id.'/edit')  }}" class="button btn-mini green">EDIT</a>
                                    <a class="button btn-mini red">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.hotels.room-type.destroy', $roomGroup->id]]) !!}
                                        <button
                                                class="btn-mini red"
                                                type="button"
                                                data-toggle="modal"
                                                data-target="#confirmDelete"
                                                data-title="Delete {{ $roomGroup->room_type }} "
                                                data-message="Are you sure you want to delete this {{ $roomGroup->room_type }} ?"
                                                >
                                            <i class="glyphicon glyphicon-trash"></i> Delete
                                        </button>
                                        {!! Form::close() !!}

                                        @include('common.delete-confirm')
                                    </a>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection