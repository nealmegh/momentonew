@extends('admin.layout.admin-layout')
@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Hotel Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">

        @include('admin.tours._left-nav')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Tour Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>

                @include('flash::message')
                <a href="{{ url('admin/tours/create') }}" class="button btn-small sky-blue1">Create Tour</a>

                <hr />

                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>All Tours</h2>

                        @foreach($tours as $tour)
                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-beach yellow-bg"></i>
                                <a href="{{ url('admin/hotels/'.$tour->id) }}">
                                    <p class="all-user box-title pull-left">{{ $tour->title }}
                                        <span class="price">
                                            //
                                        </span>
                                    </p>
                                </a>
                                <div class="pull-right">
                                    <a href="{{ url('admin/tours/gallery/'.$tour->id)  }}" class="button btn-mini green">GALLERY</a>
                                    <a href="{{ url('admin/tours/feature?tour='.$tour->id)  }}" class="button btn-mini green">FEATURE</a>
                                    <a href="{{ url('admin/tours/'.$tour->id.'/edit')  }}" class="button btn-mini yellow">EDIT</a>
                                    {!! Form::open(['url'=>['admin/tours/'.$tour->id], 'method'=>'DELETE', 'class'=>'inline-block']) !!}
                                    {!! Form::hidden('tour_id', $tour->id) !!}
                                    <button type="submit" class="button btn-mini red">DELETE</button>
                                    {!! Form::close() !!}
                                @if($tour->status == 1)
                                    <a href="{{ url('admin/tours/status?tour='.$tour->id)  }}" class="button btn-mini green">Active</a>

                                @else
                                    <a href="{{ url('admin/tours/status?tour='.$tour->id)  }}" class="button btn-mini red">Inactive</a>

                                @endif
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>
                <?php echo $tours->render(); ?>
            </div>
        </div>
    </div>
@endsection