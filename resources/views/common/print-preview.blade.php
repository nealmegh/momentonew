<?php
    if($booking->bookable != null)
        $diff = date_diff(date_create($booking->bookable->date_from), date_create($booking->bookable->date_to));
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Print Preview</title>
    {{--<link rel="stylesheet" href="/css/print-style.css" media="all" />--}}
    <style>
        @font-face {
            font-family: Arial, Helvetica, sans-serif;
            {{--src: url( {{ asset('fonts/Arial, Helvetica, sans-serif-Regular.ttf') }} );--}}
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 19cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            text-align: left;
            margin-top: 8px;
        }

        #logo img {
            height: 65px;
            padding: 10px 0;
        }

        #company {
            /*: right;*/
            text-align: right;
        }


        #details {
            margin-bottom: 50px;
        }

        #client {
            text-transform: uppercase;
            padding-left: 0px;
            /* border-left: 6px solid #0087C3; */
            text-align: left;
        }

        #client .to {
            color: #777777;
            line-height: 16px;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
            line-height: 1.4em;
        }

        #invoice {
            text-align: right;
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 1.8em;
            line-height: 1em;
            font-weight: normal;
            margin: 0  0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }
        thead {
            background: #EEEEEE;
        }

        table th,
        table td {
            padding: 10px;
            /*background: #EEEEEE;*/
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table tr {
            /*border-bottom: 1px solid #DDD;*/
        }

        table td {
            text-align: right;
        }

        table td h3{
            color: #0087C3;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            /*color: #FFFFFF;*/
            /*font-size: 1.6em;*/
            border-bottom: 1px solid #DDD;
        }

        table .desc {
            text-align: left;
            width: 45%;
            border-bottom: 1px solid #DDD;
        }

        table .unit {
            /*background: #DDDDDD;*/
            border-bottom: 1px solid #DDD;
        }

        table .qty {
            border-bottom: 1px solid #DDD;
        }

        table .total {
            /*background: #0087C3;*/
            /*color: #FFFFFF;*/
            border-bottom: 1px solid #DDD;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.1em;
        }

        table tbody tr:last-child td {
            /*border: none;*/
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #0087C3;
            font-size: 1.4em;
            border-top: 1px solid #0087C3;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks{
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices{
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            /*position: absolute;*/
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }

        header table td, .user-info table td {
            background: #ffffff;
            padding: 5px;
        }

        header table {
            margin: 0;
        }

        .info .img {
          border: 1px solid;
          width: 230px;
        }

        .info .des {
            text-align: left;
            border: 1px solid;
        }


    </style>
</head>
<body>
<header class="clearfix">
    <table>
        <tr>
            <td id="logo">
                <img src="{{ asset('images/logo_pdf.png') }}">
            </td>
            <td id="company">
                <h2 class="name">{{$settings->site_title}}</h2>
                <div>{{$settings->address}}</div>
                <div>{{$settings->phone_no}}</div>
                <div><a href="mailto:{{$settings->admin_email}}">{{$settings->admin_email}}</a></div>
            </td>
        </tr>
    </table>

</header>
<main>

    <table class="user-info clearfix">
        <tbody>
            <tr>
                <td id="client">
                    <div class="to">BILL TO:</div>
                    <h2 class="name">{{ $booking->guest->first_name }} {{ $booking->guest->last_name }}</h2>
                    <div class="address">Address: {{ $booking->guest->address }}, {{ $booking->guest->city }} {{ $booking->guest->zip }}</div>
                    <div class="email">Mobile: {{ '('.$booking->guest->country_code.') '.$booking->guest->phone_no }}</div>
                    <div class="email"><a href="mailto:{{ $booking->guest->email }}">Mail: {{ $booking->guest->email }}</a></div>
                </td>
                <td>
                    @if( in_array( $booking->payment_method, [2,3,4]) )
                        <img src="{{ asset('images/paid.jpg') }}" width="150px">
                    @endif
                </td>
                <td id="invoice">
                    <h1>INVOICE {{ $booking->booking_no }}</h1>
                    <div class="date">Date of Booking: {{ ($booking->bookable != null) ? date("M d, Y", strtotime($booking->bookable->created_at)) : '' }}</div>
                    {{--<div class="date">Due Date: 30/06/2014</div>--}}
                </td>
            </tr>
        </tbody>
    </table>
    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">NIGHT</th>
            <th class="total">TOTAL</th>
        </tr>
        </thead>
        <tbody>
        @if($booking->bookable != null && $booking->route == 'hotel')

            <tr>

            <td class="no">01</td>
            <td class="desc">
                <h3>{{ $booking->bookable->service->name }}</h3>
                {{ $booking->bookable->service->address }}, {{ $booking->bookable->service->city }}, {{ $booking->bookable->service->state }} {{ $booking->bookable->service->zip }}, {{ $booking->bookable->service->country }}<br/>
                Rome Type: {{$booking->bookable->rooms}} {{$booking->bookable->roomType->room_type}}<br/>
                For {{$booking->bookable->adults}} Adults and {{$booking->bookable->kids}} Kids
            </td>
            <td class="unit">{{ $settings->currency }}{{$booking->bookable->roomType->price}}</td>
            <td class="qty">{{ $diff->format("%a")  }} Night<br/>{{$booking->bookable->rooms}} Room</td>
            <td class="total">{{ $settings->currency }} {{$booking->bookable->roomType->price*$diff->format("%a")*$booking->bookable->rooms}}.00</td>

        </tr>

        </tbody>
        <tfoot>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>{{ $settings->currency }} {{$booking->bookable->roomType->price*$diff->format("%a")*$booking->bookable->rooms}}.00</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX {{$booking->tax}}%</td>
            <td>{{ $settings->currency }} {{$booking->bookable->roomType->price*$diff->format("%a")*$booking->bookable->rooms*($booking->tax/100)}}.00</td>
        </tr>
        @endif


        @if($booking->bookable != null && $booking->route == 'tour')

            <tr>

                <td class="no">01</td>
                <td class="desc">
                    <h3>{{ $booking->bookable->service->name }}</h3>
{{--                    {{ $booking->bookable->service->address }}, {{ $booking->bookable->service->city }}, {{ $booking->bookable->service->state }} {{ $booking->bookable->service->zip }}, {{ $booking->bookable->service->country }}<br/>--}}
{{--                    Rome Type: {{$booking->bookable->rooms}} {{$booking->bookable->roomType->room_type}}<br/>--}}
                    For {{$booking->bookable->adults}} Adults @if($booking->bookable->kids > 0) and {{$booking->bookable->kids}} Child @endif
                </td>
                <td class="unit">Adult: {{ $settings->currency }} {{ $booking->bookable->service->price_per_adult }} @if($booking->bookable->kids > 0) <br/>Child: {{ $settings->currency }} {{ $booking->bookable->service->price_per_child }} @endif</td>
                <td class="qty">{{ $booking->bookable->total_days }} Days </td>
                <td class="total">{{ $settings->currency }} {{ $booking->bookable->total_price }}</td>

            </tr>

        </tbody>
        <tfoot>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            @if($booking->route == 'hotel')
                <td>{{ $settings->currency }} {{$booking->bookable->roomType->price*$diff->format("%a")*$booking->bookable->rooms}}.00</td>
            @endif

            @if($booking->route == 'tour')
                <td>{{ $settings->currency }} {{ $booking->bookable->total_price }}</td>
            @endif
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">Service Chanrge & TAX {{ $booking->tax }}%</td>
            @if($booking->route == 'hotel')
            <td>{{ $settings->currency }} {{$booking->bookable->roomType->price*$diff->format("%a")*$booking->bookable->rooms*($booking->tax/100)}}.00</td>
            @endif

            @if($booking->route == 'tour')
                <td>{{ $settings->currency }} {{  $booking->bookable->total_price*$booking->tax/100 + $settings->service_charge }}</td>
            @endif
        </tr>
        </tr>
        @endif

        <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            @if($booking->route == 'hotel')
                <td>{{ $settings->currency }} {{ $booking->total_price }}</td>
            @endif

            @if($booking->route == 'tour')
            <td>{{ $settings->currency }} {{ $booking->bookable->total_price + $booking->bookable->total_price*$booking->tax/100 + $settings->service_charge }}</td>
            @endif
        </tr>
        </tfoot>
    </table>
    <div id="thanks" class="text-center">Thank you!</div>

    <hr>

    <h2>Payment</h2>
    <p>{!! $booking->paymentMethod->terms !!}</p>
    <br>
    <p class="red-color">Payment Method: {!! $booking->paymentMethod->name !!}</p>
    <hr>
    <h2>View Booking Details</h2>
    @if($booking->route == 'hotel')
        <?php $image = $booking->bookable->roomType->roomImage()->where('type','=','room')->first() ;?>

        <table class="info">
            <tr>
                <td class="img">
                    @if($image)
                        <img width="230" height="160" claess="attachment-list-thumb wp-post-image" alt="" src="{{ asset($image->path.'/'.$image->name) }}">
                    @else
                        <img width="230" height="160" class="attachment-list-thumb wp-post-image" src="{{ asset('images/no-image.png') }}">
                    @endif
                </td>
                <td class="des">
                    <div class="col-md-4"><h3>Hotel Information</h3></div>
                    <div class="col-md-4">{!! $booking->bookable->service->name !!}</div>
                    {{--<br/>--}}

                    <div class="col-md-12">Room: {!! $booking->bookable->roomType->room_type !!}</div>
                    <div class="col-md-12">Description: {!! $booking->bookable->roomType->description !!}</div>
                    <div class="col-md-12">Total Bed: {!! $booking->bookable->roomType->total_bed !!}</div>
                    <div class="col-md-12">Check In Date: {!! $booking->bookable->date_from !!}</div>
                    <div class="col-md-12">Check Out Date: {!! $booking->bookable->date_to !!}</div>
                </td>
            </tr>

        </table>

        <div class="col-md-12">Cancellation Policy: <br/>{!! $booking->bookable->service->cancellation !!}</div>


    @endif

    @if($booking->route == 'tour')
        <div class="row">
            {{--<div class="col-md-12">Room: {!! $booking->bookable->roomType->room_type !!}</div>--}}
            <div class="col-md-12">Description: {!! $booking->bookable->service->description !!}</div>
            <div class="col-md-12">Total Days of Tour: {!! $booking->bookable->service->total_days !!}</div>
        </div>
        <div class="row">
            <div class="travelo-google-map full-box"></div>
        </div>
        {{--<div class="row">--}}
            {{--<div class="col-md-4">Hotel Information</div>--}}
            {{--<div class="col-md-4">Terms: {!! $booking->bookable->service->terms !!}</div>--}}
            {{--<div class="col-md-4">Cancellation Policy:{!! $booking->bookable->service->cancellation !!}</div>--}}
        </div>
    @endif

</main>

<footer>
    <div>{{$settings->address}}</div>
    <div>Hot line: {{$settings->phone_no}} | Email: {{ $settings->admin_email }}</div>
    <div>Website: www.momentotravels.com | Facebook: {{ $settings->facebook }}</div>

</footer>


@include('footer.footer-script')


</body>
</html>

