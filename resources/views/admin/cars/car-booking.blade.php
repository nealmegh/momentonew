@extends('admin.layout.admin-layout')
@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Car Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">

        @include('admin.cars._left-nav')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Car Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                <br />
                <a href="{{ url('admin/car/create') }}"><i class="soap-icon-user circle"></i>Create Car</a>


                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>All Cars</h2>

                        {{--@foreach($cars as $car)--}}
                            {{--<div class="icon-box style1 fourty-space">--}}
                                {{--<i class="soap-icon-support takeoff-effect yellow-bg"></i>--}}
                                {{--<a href="{{ url('admin/car/'.$car->id) }}"><p class="all-user box-title pull-left">{{ $car->name }} <span class="price">{{ $car->category_id }}</span></p></a>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<a href="{{ url('admin/car/'.$car->id.'/edit')  }}" class="button btn-mini green">EDIT</a>--}}
                                    {{--<a class="button btn-mini red">DELETE</a>--}}
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