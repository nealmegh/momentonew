@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Car Detail'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">

        @include('admin.cars._left-nav')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Car Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                @include('flash::message')
                <hr />

                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2> Cars</h2>

                        {{--{{ $car }}--}}
                    </div>

                </div>

            </div>
        </div>
@endsection