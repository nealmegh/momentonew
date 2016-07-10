@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Flight Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">

        @include('admin.flights._left-nav')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Flight Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>

                @include('flash::message')
                <a href="{{ url('admin/flights/create') }}" class="button btn-small sky-blue1">Create Flight</a>

                <hr />

                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>All Flights</h2>

                        @foreach($flights as $flight)
                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-beach yellow-bg"></i>
                                <a href="{{ url('admin/flights/'.$flight->id) }}">
                                    <p class="all-user box-title pull-left">{{ $flight->title }}
                                        <span class="price">
                                            {{ $flight->name }}
                                        </span>
                                    </p>
                                </a>
                                <div class="pull-right">
                                    <a href="{{ url('admin/flights/facility?flight='.$flight->id)  }}" class="button btn-mini green">FEATURE</a>
                                    <a href="{{ url('admin/flights/'.$flight->id.'/edit')  }}" class="button btn-mini yellow">EDIT</a>
                                    {!! Form::open(['url'=>['admin/flights/'.$flight->id], 'method'=>'DELETE', 'class'=>'inline-block']) !!}
                                    {!! Form::hidden('flight_id', $flight->id) !!}
                                    <button
                                            class="btn-mini red"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#confirmDelete"
                                            data-title="Delete {{ $flight->name }} Flight"
                                            data-message="Are you sure you want to delete this {{ $flight->name }} Flight?"
                                            >
                                        <i class="glyphicon glyphicon-trash"></i> Delete
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>
                <?php echo $flights->render(); ?>
            </div>
        </div>
    </div>
@endsection