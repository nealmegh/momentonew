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

                @include('flash::message')
                <a href="{{ url('admin/cars/create') }}" class="button btn-small sky-blue1">Create Car</a>

                <hr />

                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>All Cars</h2>

                        @foreach($cars as $car)
                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-beach yellow-bg"></i>
                                <a href="{{ url('admin/cars/'.$car->id) }}">
                                    <p class="all-user box-title pull-left">{{ $car->title }}
                                        <span class="price">
                                            {{ $car->name }}
                                        </span>
                                    </p>
                                </a>
                                <div class="pull-right">
                                    <a href="{{ url('admin/cars/facility?car='.$car->id)  }}" class="button btn-mini green">FEATURE</a>
                                    <a href="{{ url('admin/cars/'.$car->id.'/edit')  }}" class="button btn-mini yellow">EDIT</a>
                                    {!! Form::open(['url'=>['admin/cars/'.$car->id], 'method'=>'DELETE', 'class'=>'inline-block']) !!}
                                    {!! Form::hidden('car_id', $car->id) !!}
                                    <button
                                            class="btn-mini red"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#confirmDelete"
                                            data-title="Delete {{ $car->name }} Car"
                                            data-message="Are you sure you want to delete this {{ $car->name }} Car?"
                                            >
                                        <i class="glyphicon glyphicon-trash"></i> Delete
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>
                <?php echo $cars->render(); ?>
            </div>
        </div>
    </div>
@endsection