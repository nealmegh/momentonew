@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Category Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">

        @include('admin.tours._left-nav')

        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Tours Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>

                @include('flash::message')
                <a href="{{ url('admin/tours/type/create') }}" class="button btn-small sky-blue1">Create Tours Type</a>

                <hr />
                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>All Categories</h2>


                        {{--@if($action == 'c')--}}
                            {{--@include('errors.list')--}}
                            {{--{!! Form::open(['url'=>'admin/hotels/category']) !!}--}}
                            {{--<div class="form-group">--}}
                                {{--{!! form::label('name','Name:') !!}--}}
                                {{--{!! form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Category Name']) !!}--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--{!! form::submit('Add Category',  ['class'=>'btn btn-primary form-control']) !!}--}}
                            {{--</div>--}}
                            {{--{!! Form::close() !!}--}}
                        {{--@elseif($action == 'e')--}}
                            {{--@include('errors.list')--}}
                            {{--{!! Form::model($category,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'admin/hotels/category/'.$category->id] ) !!}--}}
                            {{--<div class="form-group">--}}
                                {{--{!! form::label('name','Name:') !!}--}}
                                {{--{!! form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Cateogry Name']) !!}--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--{!! form::submit('Update Category',  ['class'=>'btn btn-primary form-control']) !!}--}}
                            {{--</div>--}}
                            {{--{!! Form::close() !!}--}}
                        {{--@endif--}}

                        {{--@foreach($categories as $category)--}}

                            {{--<div class="icon-box style1 fourty-space">--}}
                                {{--<i class="soap-icon-support takeoff-effect yellow-bg"></i>--}}
                                {{--<a href="#"><p class="all-user box-title pull-left">{{ $category->name }}</p></a>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<a href="{{ url('admin/hotels/category/'.$category->id.'/edit')  }}" class="button btn-mini green">EDIT</a>--}}
                                    {{--<a class="button btn-mini red">--}}
                                        {{--{!! Form::open(['method' => 'DELETE', 'route' => ['admin.hotels.category.destroy', $category->id]]) !!}--}}
                                        {{--{!! form::submit('DELETE') !!}--}}
                                        {{--{!! Form::close() !!}--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}

                        <a href="#">
                            <div class="load-more">. . . . . . . . . . . . . </div>
                        </a>
                    </div>

                </div>

            </div>
        </div>
@endsection