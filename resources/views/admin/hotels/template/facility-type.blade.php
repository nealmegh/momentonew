@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Facility Manager'])
@stop

@section('head')
    <style>
        .shortcode .block button { margin: 0 5px 5px 0; }

        .shortcode .block { margin-bottom: 60px; }

        .soap-icons [class^="soap-icon"] + span { display: block; }

        .icon-box { margin-bottom: 20px; }

        .soap-icons .row > div { margin-bottom: 20px; }
    </style>
@endsection

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">

        @include('admin.hotels.template._left-nav')

        <div class="tab-content">
            <div id="facility" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Facility Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                @include('flash::message')
                <a href="{{ url('admin/hotels/facility/create') }}" class="button btn-small sky-blue1">Facility Create</a>
                <hr />

                <div class="row block">
                    <div class="col-md-12 notifications ">


                            @if($action == 'c')
                            <h2>Create Facility</h2>

                            @include('errors.list')
                                {!! Form::open(['url'=>'admin/hotels/facility']) !!}
                                <div class="form-group">
                                    {!! form::label('name','Name:') !!}
                                    {!! form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Facility Name']) !!}
                                </div>
                                @include('admin.hotels.template._form_icon')
                                <div class="form-group">
                                    <button type="submit" class="button btn-medium green col-md-12">Add New Facility</button>
                                </div>
                                {!! Form::close() !!}
                            @endif

                            @if($action == 'e')
                            <h2>Edit Facility</h2>

                                    @include('errors.list')
                                {!! Form::model($facility,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'admin/hotels/facility/'.$facility->id] ) !!}
                                <div class="form-group">
                                    {!! form::label('name','Name:') !!}
                                    {!! form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Facility Name']) !!}
                                </div>
                                @include('admin.hotels.template._form_icon')
                                <div class="form-group">
                                    <button type="submit" class="button btn-medium green col-md-12">Update Facility</button>
                                </div>
                                {!! Form::close() !!}
                            @endif

                            @if($action == 'v')
                            <h2>All Facilities</h2>

                                @foreach($facilities as $facility)
                                <div class="col-md-4">
                                    <div class="icon-box style1 fourty-space">
                                        <i class="{{ $facility->icon }} yellow-bg"></i>
                                        <a href="#"><p class="all-user box-title pull-left">{{ $facility->name }}</p></a>
                                        <div class="pull-right">
                                            <a href="{{ url('admin/hotels/facility/'.$facility->id.'/edit')  }}" class="button btn-mini green">EDIT</a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.hotels.facility.destroy', $facility->id], 'class'=>'inline-block']) !!}
                                                <button
                                                        class="btn-mini red"
                                                        type="button"
                                                        data-toggle="modal"
                                                        data-target="#confirmDelete"
                                                        data-title="Delete {{ $facility->name }} Facility"
                                                        data-message="Are you sure you want to delete this {{ $facility->name }} Facility?"
                                                        >
                                                    <i class="glyphicon glyphicon-trash"></i> Delete
                                                </button>
                                                {!! Form::close() !!}
                                        </div>
                                        @include('common.delete-confirm')
                                    </div>
                                </div>
                                @endforeach

                            @endif
                    </div>

                </div>
                <?php 
                //echo $facilities->render(); 
                ?>
            </div>
        </div>
    </div>
@endsection