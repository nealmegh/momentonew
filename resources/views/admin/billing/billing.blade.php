@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'User Profile'])
@stop
@section('admin-content')
<div class="tab-container full-width-style arrow-left dashboard">
    <ul class="tabs">
        <li class="active"><a data-toggle="tab" href="#invoice"><i class="soap-icon-anchor circle"></i>Manage Invoice</a></li>
        {{--<li class=""><a data-toggle="tab" href="#payment"><i class="soap-icon-conference circle"></i>Payment Gateway</a></li>--}}
        {{--<li class=""><a data-toggle="tab" href="#changes"><i class="soap-icon-businessbag circle"></i>Supplimentary Changes</a></li>--}}
    </ul>
    <div class="tab-content">
        <div id="invoice" class="tab-pane fade in active">
            @include('admin.billing.invoice')
        </div>
        {{--<div id="payment" class="tab-pane fade">--}}
            {{--@include('admin.billing.payment-gateway')--}}
        {{--</div>--}}
        {{--<div id="changes" class="tab-pane fade">--}}
            {{--@include('admin.billing.changes')--}}
        {{--</div>--}}
    </div>
</div>

@endsection