@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Flight Schedule Manager'])
@stop

@section('head')
    <style>
        [class^="soap-icon"]:before, [class*=" soap-icon"]:before { font-size: 28px; }
    </style>
@endsection
@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">

        @include('admin.flights._left-nav')

        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Flights Feature Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>

                @include('flash::message')

                <hr />
                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>{{ $flight->title }} Feature</h2>

                        <div class="col-md-7">
                            @foreach($flight->schedule as $schedule)
                                <div class="col-md-12">
                                    <div class="icon-box style1 fourty-space">
                                        <i class="soap-icon-plane-right yellow-bg"></i>
                                        <a href="#"><p class="all-user box-title pull-left">{{ $schedule->flight_no }}</p></a>
                                        <div class="pull-right">
                                            <a href="{{ url('admin/flights/schedule/'.$schedule->id.'/edit')  }}" class="button btn-mini green">EDIT</a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.flights.schedule.destroy', $schedule->id], 'class'=>'inline-block']) !!}
                                            <button
                                                    class="btn-mini red"
                                                    type="button"
                                                    data-toggle="modal"
                                                    data-target="#confirmDelete"
                                                    data-title="Delete {{ $schedule->name }} Facility"
                                                    data-message="Are you sure you want to delete this {{ $schedule->name }} Facility?"
                                                    >
                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
                                        @include('common.delete-confirm')
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-5">
                            @if($action == 'c')

                                @include('errors.list')
                                {!! Form::open(['url'=>'admin/flights/schedule']) !!}
                                {!! Form::hidden('flight_id', $flight->id) !!}
                                <div class="row form-group">
                                    <button type="submit" class="button btn-medium green col-md-12">Add New Schedule</button>
                                </div>
                                <div class="row form-group">
                                    {!! form::text('flight_no', null, ['class'=>'input-text  col-md-12', 'placeholder'=>'Flight No']) !!}
                                </div>
                                <div class="row form-group">
                                    {!! form::text('take_of', null, ['class'=>'input-text  col-md-12', 'placeholder'=>'Take Off']) !!}
                                </div>
                                <div class="row form-group">
                                    {!! form::text('landing', null, ['class'=>'input-text  col-md-12', 'placeholder'=>'Landing']) !!}
                                </div>
                                <div class="row form-group">
                                    {!! form::text('duration', null, ['class'=>'input-text  col-md-12', 'placeholder'=>'Duration']) !!}
                                </div>
                                <div class="row form-group">
                                    {!! form::text('layover', null, ['class'=>'input-text  col-md-12', 'placeholder'=>'Layover']) !!}
                                </div>

                                {!! Form::close() !!}
                            @endif

                            @if($action == 'e')
                                <h2>Edit Facility</h2>

                                @include('errors.list')
                                {!! Form::model($schedule,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'admin/flights/schedule/'.$schedule->id] ) !!}
                                {!! Form::hidden('flight_id', $flight->id) !!}
                                    <div class="form-group">
                                        <button type="submit" class="button btn-medium green col-md-12">Update Facility</button>
                                    </div>
                                    <div class="row form-group">
                                        {!! form::text('flight_no', null, ['class'=>'input-text  col-md-12', 'placeholder'=>'Flight No']) !!}
                                    </div>
                                    <div class="row form-group">
                                        {!! form::text('take_of', null, ['class'=>'input-text  col-md-12', 'placeholder'=>'Take Off']) !!}
                                    </div>
                                    <div class="row form-group">
                                        {!! form::text('landing', null, ['class'=>'input-text  col-md-12', 'placeholder'=>'Landing']) !!}
                                    </div>
                                    <div class="row form-group">
                                        {!! form::text('duration', null, ['class'=>'input-text  col-md-12', 'placeholder'=>'Duration']) !!}
                                    </div>
                                    <div class="row form-group">
                                        {!! form::text('layover', null, ['class'=>'input-text  col-md-12', 'placeholder'=>'Layover']) !!}
                                    </div>

                                {!! Form::close() !!}
                            @endif


                        </div>





                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection