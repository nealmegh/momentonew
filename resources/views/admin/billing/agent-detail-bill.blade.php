@extends('admin.layout.admin-layout')
@section('page-title')
    @include('common.page-title', ['PageTitle'=>'User Billing Profile'])
@stop
@section('admin-content')
<div class="tab-container full-width-style arrow-left dashboard">
    <ul class="tabs">
        <li class="active"><a href="/admin/billing"><i class="soap-icon-anchor circle"></i>Back</a></li>
        {{--<li class=""><a data-toggle="tab" href="#payment"><i class="soap-icon-conference circle"></i>Payment Gateway</a></li>--}}
        {{--<li class=""><a data-toggle="tab" href="#changes"><i class="soap-icon-businessbag circle"></i>Supplimentary Changes</a></li>--}}
    </ul>


    <div class="tab-content">
        <div id="invoice" class="tab-pane fade in active">
        <h1>Agent: {{ $agent->first_name }}<br/>Month: {{ date('F, Y') }} </h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Booking No.</th>
                <th>Name</th>
                <th align="right">Commission</th>
                <th align="right">Price</th>

            </tr>
            </thead>

            <tbody>
            <?php
                $count = 0;
                $total_price = 0;
                $total_commission = 0;
            ?>
            @foreach($bookings as $booking)

                <?php
                    $count++;
                    $total_price += $booking->total_price;
                    $total_commission += ($booking->total_price*$agent->agentMarkup->commission)/100;
                ?>

                    <tr>
                        <th scope="row"><a style="display:block;" href="#">{{$count}}</a></th>
                        <td>{{$booking->created_at}}</td>
                        <td>{{$booking->booking_no}}</td>
                        <td>{{$booking->route}}</td>
                        <td align="right">{{ $settings->currency.' '.($booking->total_price*$agent->agentMarkup->commission)/100 }}</td>
                        <td align="right">{{ $settings->currency.' '.$booking->total_price }}</td>
                    </tr>

            @endforeach
            <tr>
                <td colspan="3"></td>
                <td>Total</td>
                <td align="right"> {{ $settings->currency.' '.$total_commission }} </td>
                <td align="right">{{ $settings->currency.' '.$total_price.'.00' }}</td>
            </tr>
            </tbody>

        </table>


        </div>
    </div>
</div>
@endsection