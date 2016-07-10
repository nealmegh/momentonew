@extends('master-agents')

@section('content')
    @include('agents._left-nav')
    <div class="tab-content">
        <div id="dashboard" class="tab-pane fade in active">
            @include('common.template.dashboard')
        </div>
        <div id="profile" class="tab-pane fade">
            @include('common.template.profile')
        </div>
        <div id="hotel" class="tab-pane fade">
            @if($hotels != null)
                @include('common.template.hotel')
                {{--{!! $hotels->render(); !!}--}}
            @endif
        </div>
        <div id="booking" class="tab-pane fade">
            @include('common.template.booking', ['url'=>'agents/booking-invoice'])
        </div>
        {{--<div id="room-vacancy" class="tab-pane fade">--}}
            {{--@include('common.template.room-vacancy')--}}
        {{--</div>--}}
        {{--<div id="customer-order" class="tab-pane fade">--}}
            {{--@include('common.template.customer')--}}
        {{--</div>--}}
        <div id="report" class="tab-pane fade">
            @include('agents.layout.report')
        </div>
        <div id="markup" class="tab-pane fade">
            <h2>Mark Up</h2>
            <h5 class="skin-color">Change Your MarkUp Value</h5>
            {!! Form::open(['url'=>'agents/markup', 'method'=>'put']) !!}
            {!! Form::hidden('agent_id', Auth::user()->id) !!}
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        @if(isset(Auth::user()->agentMarkup->markup))
                            {!! Form::text('markup', Auth::user()->agentMarkup->markup, ['class'=>'input-text full-width', 'placeholder'=>'Your Markup %']) !!}
                        @else
                            {!! Form::text('markup', null, ['class'=>'input-text full-width', 'placeholder'=>'Your Markup %']) !!}
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <button class="btn-medium">UPDATE MARKUP</button>
                </div>
            {!! Form::close() !!}



        </div>

    </div>
@endsection