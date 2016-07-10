@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Discount Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        <ul class="tabs">
            <li class=""><a href="{{ URL::previous() }}"><i class="circle"></i>Back</a></li>
        </ul>

        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to {{ $service->title }} Discount Page!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                @include('flash::message')


                <hr />


                <div class="row block">
                    <div class="col-md-12 notifications">
                        @include('errors.list')
{{--                        {{ dd($service->discount->amount) }}--}}
                        @if(isset($service->discount->amount))
                            {!! Form::model($service->discount,['method' => 'PATCH'] ) !!}
                        @else
                            {!! Form::open(['method' => 'POST'] ) !!}
                        @endif
                            <div class="form-group col-md-4">
                                {!! Form::text('amount', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection