@extends('admin.layout.admin-layout')
@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Hotel Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">

        @include('admin.hotels.template._left-nav')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Hotel Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                <br />
                <a href="{{ url('admin/hotels/create') }}"><i class="soap-icon-user circle"></i>Create Hotel</a>


                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>All Hotels</h2>

                        @foreach($hotels as $hotel)
                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-support takeoff-effect yellow-bg"></i>
                                <a href="{{ url('admin/hotels/'.$hotel->id) }}"><p class="all-user box-title pull-left">{{ $hotel->name }} <span class="price">{{ $hotel->category_id }}</span></p></a>
                                <div class="pull-right">
                                    <a href="{{ url('admin/hotels/'.$hotel->id.'/edit')  }}" class="button btn-mini green">EDIT</a>
                                    <a class="button btn-mini red">DELETE</a>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>

            </div>
        </div>
@endsection