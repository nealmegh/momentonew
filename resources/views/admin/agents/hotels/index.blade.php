@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Assign Hotels'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.agents._left-menu')

        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Reviews Manager</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                @include('flash::message')
                <hr />
                <div class="row block">
                    <div class="col-md-8 notifications">
                        <h2>Assign Hotels</h2>

                        @if($user->agentHotels != null)
                            @foreach($user->agentHotels as $hotel)

                                <div class="icon-box style1 fourty-space">
                                    <i class="soap-icon-hotel-1 yellow-bg"></i>
                                    <a href="#"><p class="all-user box-title pull-left">{{ $hotel->hotelInfo->name }}  <span class="price">{{ $hotel->hotelInfo->service }}</span></p></a>

                                    <div class="pull-right">
                                            {!! Form::open(['method' => 'DELETE', 'url'=>'admin/agents/hotels/'.$hotel->hotel_id]) !!}
                                            <button
                                                    class="btn-mini red"
                                                    type="button"
                                                    data-toggle="modal"
                                                    data-target="#confirmDelete"
                                                    data-title="Detach Hotel"
                                                    data-message="Are you sure you want to detach {{ $hotel->hotelInfo->name }} from {{ $user->first_name }}?"
                                                    >
                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                            </button>
                                            {!! Form::close() !!}
                                    </div>
                                    @include('common.delete-confirm')

                                </div>
                            @endforeach
                            @endif

                    </div>
                    <div class="col-md-4">

                        @if($action == 'c')
                            <h2>Add Hotels</h2>

                            @include('errors.list')
                            {!! Form::open(['url'=>'admin/agents/hotels']) !!}
                            {!! Form::hidden('status', '1') !!}
                            <div class="row form-group">
                                {!! form::label('user_id','Agents Name: '.$user->first_name) !!}
                                {!! form::hidden('user_id', $user->id , ['class'=>'input-text full-width', 'placeholder'=>'Rating Type Name']) !!}
                            </div>
                            <div class="row form-group">
                                <div class="selector">
                                {!! form::select('hotel_id', $hotels, null, ['class'=>'input-text full-width', 'placeholder'=>'Rating Type Name']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                {!! form::submit('Add Rating Type',  ['class'=>'btn btn-primary full-width']) !!}
                            </div>
                            {!! Form::close() !!}

                        @endif


                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection