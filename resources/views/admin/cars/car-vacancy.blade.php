@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Vacancy  Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        {{--@if($action == 'v')--}}
            {{--@include('admin.cars.template._left-nav')--}}
        {{--@else--}}
            {{--<ul class="tabs">--}}
                {{--<li class="active"><a href="{{ url('admin/car/vacancy?car='.$car->id) }}"><i class="soap-icon-arrow-left circle"></i>Back</a></li>--}}
            {{--</ul>--}}
        {{--@endif--}}
        <div class="tab-content">

            <div class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Vacancy Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                {{--@if($action == 'v')--}}
                {{--<a href="{{ url('admin/car/vacancy/create?car='.$car->id) }}" class="button btn-small sky-blue1">New Car Vacancy</a>--}}
                {{--@endif--}}
                <hr />
                <div class="row block">
                    <div class="col-md-12 notifications">

                        {{--@if($action == 'v')--}}
                        {{--<h2>{{ $car->name }} Vacancy</h2>--}}

                        {{--@foreach($carVacancies as $vacancy)--}}

                            {{--<div class="icon-box style1 fourty-space">--}}
                                {{--<i class="soap-icon-support yellow-bg"></i>--}}
                                {{--<a href="#">--}}
                                    {{--<p class="all-user box-title pull-left">--}}
                                        {{--{{ $vacancy->date_from.' to '.$vacancy->date_to }} ---}}
                                        {{--@if($car = $vacancy->car)--}}
                                          {{--{{ $car->name }} ---}}
                                        {{--@endif--}}

                                        {{--@if($type = $vacancy->roomType)--}}
                                            {{--{{ $type->room_type }}--}}
                                        {{--@endif--}}
                                    {{--</p>--}}
                                {{--</a>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<a href="{{ url('admin/car/vacancy/'.$vacancy->id.'/edit?car='.$car->id.'&amp;roomType='.$type->id)  }}" class="button btn-mini green">EDIT</a>--}}
                                    {{--<a class="button btn-mini red">--}}
                                        {{--{!! Form::open(['method' => 'DELETE', 'route' => ['admin.car.vacancy.destroy', $vacancy->id]]) !!}--}}
                                        {{--{!! form::submit('DELETE') !!}--}}
                                        {{--{!! Form::close() !!}--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}


                        {{--@endif--}}
                        {{--@if($action == 'c')--}}

                            {{--@include('errors.list')--}}

                                {{--{!! Form::open(['url'=>'admin/car/vacancy']) !!}--}}
                                    {{--@include('admin.cars.template._form-room-vacancy', ['SubmitButtonText' => 'Add Room Vacancy'])--}}
                                {{--{!! Form::close() !!}--}}
                                {{--@elseif($action == 'e')--}}
                                    {{--@include('errors.list')--}}
                                {{--{!! Form::model($carVacancy,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'admin/car/vacancy/'.$carVacancy->id] ) !!}--}}
                                    {{--@include('admin.cars.template._form-room-vacancy', ['SubmitButtonText' => 'Update Room Vacancy'])--}}
                                {{--{!! Form::close() !!}--}}

                        {{--@endif--}}
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection