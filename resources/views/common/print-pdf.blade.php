<?php $diff = date_diff(date_create($booking->bookable->date_from), date_create($booking->bookable->date_to)); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Print Preview</title>
    <link rel="stylesheet" href="/css/print-style.css" media="all" />
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="{{ asset('images/logo.png') }}">
    </div>
    <div id="company">
        <h2 class="name">{{$settings->site_name}}</h2>
        <div>{{$settings->address}}</div>
        <div>{{$settings->phone_no}}</div>
        <div><a href="mailto:{{$settings->admin_email}}">{{$settings->admin_email}}</a></div>
    </div>
    </div>
</header>
<main>
    <div id="details" class="clearfix">
        <div id="client">
            <div class="to">BILL TO:</div>
            <h2 class="name">{{ $booking->guest->first_name }} {{ $booking->guest->last_name }}</h2>
            <div class="address">Address: {{ $booking->guest->address }}, {{ $booking->guest->city }} {{ $booking->guest->zip }}</div>
            <div class="email">Mobile: {{ '('.$booking->guest->country_code.') '.$booking->guest->phone_no }}</div>
            <div class="email"><a href="mailto:{{ $booking->guest->email }}">Mail: {{ $booking->guest->email }}</a></div>

        </div>
        <div id="invoice">
            <h1>INVOICE {{ $booking->booking_no }}</h1>
            <div class="date">Date of Booking: {{ date("M d, Y", strtotime($booking->bookable->created_at)) }}</div>
            {{--<div class="date">Due Date: 30/06/2014</div>--}}
        </div>
    </div>
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
        <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>{{ $settings->currency }} {{ $booking->total_price }}</td>
        </tr>
        </tfoot>
    </table>
    <div id="thanks">Thank you!</div>
    {{--<div id="notices">--}}
        {{--<div>NOTICE:</div>--}}
        {{--<div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>--}}
    {{--</div>--}}
    <h2>Payment</h2>
    <p>Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi adipiscing placerat. Nam vel scelerisque magna. Donec justo urna, posuere ut dictum quis.</p>
    <br>
    <p class="red-color">Payment Method: Cash on Delivery.</p>
    {{--<hr>--}}
    <h2>View Booking Details</h2>
    <p>Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi adipiscing placerat. Nam vel scelerisque magna. Donec justo urna, posuere ut dictum quis.</p>
    <br>
</main>
<footer>
    Invoice was created on a computer and is valid without the signature and seal.
</footer>
</body>
</html>