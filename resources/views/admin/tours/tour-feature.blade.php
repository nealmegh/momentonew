@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Feature Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">

        @include('admin.tours._left-nav')

        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Tours Feature Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>

                @include('flash::message')

                <hr />
                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>{{ $tour->title }} Feature</h2>


                        @if($action == 'c')
                            @include('errors.list')
                            {!! Form::open(['url'=>'admin/tours/feature']) !!}
                            <div class="form-group">
                                {!! form::text('feature', null, ['class'=>'form-control', 'placeholder'=>'Feature Description']) !!}
                                {!! form::select('package', ['include'=>'Include', 'exclude'=>'Exclude'], null, ['class'=>'form-control', 'placeholder'=>'Feature Description']) !!}
                                {!! Form::hidden('tour_id', $tour->id) !!}
                            </div>

                            <div class="form-group">
                                {!! form::submit('Add Feature',  ['class'=>'btn btn-primary form-control']) !!}
                            </div>
                            {!! Form::close() !!}
                        @elseif($action == 'e')
                            @include('errors.list')
                            
                            {!! Form::model($tourFeature,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'admin/tours/feature/'.$tourFeature->id] ) !!}
                            <div class="form-group">
                                {!! form::text('feature', null, ['class'=>'form-control', 'placeholder'=>'Feature Description']) !!}
                                {!! form::select('package', ['include'=>'Include', 'exclude'=>'Exclude'], null, ['class'=>'form-control', 'placeholder'=>'Feature Description']) !!}
                                {!! Form::hidden('tour_id', $tour->id) !!}
                            </div>
                            <div class="form-group">
                                {!! form::submit('Update Feature',  ['class'=>'btn btn-primary form-control']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif

                        @foreach($tour->features as $feature)

                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-availability yellow-bg"></i>
                                <a href="#"><p class="all-user box-title pull-left">{{ $feature->feature }}</p> <span>{{ $feature->package }}</span></a>
                                <div class="pull-right">
                                    <a href="{{ url('admin/tours/feature/'.$feature->id.'/edit?tour='.$tour->id)  }}" class="button btn-mini green">EDIT</a>
                                    <a class="button btn-mini red">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.tours.feature.destroy', $feature->id]]) !!}
                                        {!! form::submit('DELETE') !!}
                                        {!! Form::close() !!}
                                    </a>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>

            </div>
        </div>
@endsection

