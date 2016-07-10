<?php
    if( $booking->bookable != null) {
        $diff = date_diff(date_create($booking->bookable->date_from), date_create($booking->bookable->date_to));
    }
?>

@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Booking Dashboard'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        <ul class="tabs">
            <li class="active"><a href="{{ url('admin/booking#dashboard') }}"><i class="soap-icon-arrow-left circle"></i>Back</a></li>
            <li class=""><a href="{{ url('admin/booking/detail/'.$booking->booking_no.'/print-preview') }}"><i class="soap-icon-magazine circle"></i>Print</a></li>
            <li class=""><a href="{{ url('admin/booking/detail/'.$booking->booking_no.'/pdf-download') }}"><i class="soap-icon-stories circle"></i>PDF</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active">
                <div class="col-sm-9 ">
                    <div class="booking-details">
                        <h2>Booking Details</h2>
                        <article class="image-box hotel listing-style1">
                            <figure class="clearfix">
                            <div class="col-sm-8">
                                <dl class="term-description">
                                    <dt>Booking number:</dt><dd>{{ $booking->booking_no }}</dd>
                                    <dt>First name:</dt><dd>{{ $booking->guest->first_name }}</dd>
                                    <dt>Last name:</dt><dd>{{ $booking->guest->last_name }}</dd>
                                    <dt>E-mail address:</dt><dd>{{ $booking->guest->email }}</dd>
                                    <dt>Street Address:</dt><dd>{{ $booking->guest->address }}</dd>
                                    <dt>Town / City:</dt><dd>{{ $booking->guest->city }}</dd>
                                    <dt>ZIP code:</dt><dd>{{ $booking->guest->zip }}</dd>
                                    <dt>Country:</dt><dd>{{ $booking->guest->country }}</dd>
                                </dl>
                            </div>
                            <div class="col-sm-4">
                                @if($booking->route == 'hotel' && $booking->bookable != null)

                                    <figure class="clearfix">
                                    <a href="#" class="hover-effect middle-block" style="position: relative;">
                                        <img class="middle-item" width="270" height="161" alt="" src="{{ asset($booking->bookable->service->images[1]->path.'/thumbnail/'.$booking->bookable->service->images[1]->name) }}" style="position: absolute; top: 50%; margin-top: -37.5px; left: 50%; margin-left: -63px;">
                                    </a>
                                    <div class="travel-title">
                                        <h5 class="box-title">{{ $booking->bookable->service->name }}<small>{{ $booking->bookable->service->city }}, {{ $booking->bookable->service->country }}</small></h5>
                                    </div>
                                </figure>
                                <div class="details">
                                    <div class="feedback">
                                        <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="" data-original-title="4 stars"><span style="width: {{ $booking->bookable->service->grade->id*20 }}%;" class="five-stars"></span></div>
                                        <span class="review">0 reviews</span>
                                    </div>
                                    <div class="constant-column-3 timing clearfix">
                                        <div class="check-in">
                                            <label>Check in</label>
                                            <span>{{$booking->bookable->date_from}}<br>11 AM</span>
                                        </div>
                                        <div class="duration text-center">
                                            <i class="soap-icon-clock"></i>
                                            <span>{{ $diff->format("%a")  }} Nights</span>
                                        </div>
                                        <div class="check-out">
                                            <label>Check out</label>
                                            <span>{{$booking->bookable->date_to}}<br>2 PM</span>
                                        </div>
                                    </div>
                                    <div class="guest">
                                        <small class="uppercase">{{$booking->bookable->rooms}} {{$booking->bookable->roomType->room_type}} <span class="skin-color">{{$booking->bookable->adults}} Persons</span></small>
                                    </div>
                                </div>
                                @elseif($booking->route == 'tour')

                                    <figure class="clearfix">
                                        <a href="hotel-detailed.html" class="hover-effect middle-block" style="position: relative;">
                                            <img class="middle-item" width="270" height="161" alt="" src="{{ asset($booking->bookable->service->images[1]->path.'/thumbnail/'.$booking->bookable->service->images[1]->name) }}" style="position: absolute; top: 50%; margin-top: -37.5px; left: 50%; margin-left: -63px;">
                                        </a>
                                        <div class="travel-title">
                                            <h5 class="box-title">{{ $booking->bookable->service->name }}<small>{{ $booking->bookable->service->city }}, {{ $booking->bookable->service->country }}</small></h5>
                                            <a href="hotel-detailed.html" class="button">EDIT</a>
                                        </div>
                                    </figure>
                                    <div class="details">
                                        <div class="feedback">
                                            <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="" data-original-title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                            <span class="review">270 reviews</span>
                                        </div>
                                        <div class="constant-column-3 timing clearfix">
                                            <div class="check-in">
                                                <label>Tour Start</label>
                                                <span>{{$booking->bookable->date_from}}</span>
                                            </div>
                                            <div class="duration text-center">
                                                <i class="soap-icon-clock"></i>
                                                <span>{{$booking->bookable->total_days }} Days</span>
                                            </div>
                                            <div class="check-out">
                                                <label>Tour End</label>
                                                <span>{{$booking->bookable->date_to}}</span>
                                            </div>
                                        </div>
                                        <div class="guest">
                                             <small class="uppercase">For {{$booking->bookable->adults}} Adults and <span class="skin-color"> {{$booking->bookable->kids}} Kids</span></small>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            </figure>

                        </article>


                        <h4>Other Details</h4>
                        <dl class="other-details">
                            @if($booking->route == 'hotel')
                                @if($booking->bookable != null)
                                <dt class="feature">room Type:</dt><dd class="value">{{$booking->bookable->roomType->room_type}}</dd>
                                <dt class="feature">per Room price:</dt><dd class="value">{{ $settings->currency }} {{ $booking->bookable->roomType->price }}</dd>
                                <?php $diff = date_diff(date_create($booking->bookable->date_from), date_create($booking->bookable->date_to)); ?>
                                <dt class="feature">{{ $diff->format("%a")  }} night and {{$booking->bookable->rooms}} {{$booking->bookable->roomType->room_type}}:</dt><dd class="value">{{ $settings->currency }} {{$booking->total_price}}</dd>
                                @endif

                                <dt class="feature">taxes and Service Charge:</dt><dd class="value">{{ number_format( $booking->tax*$booking->bookable->roomType->price/100 + $settings->service_charge, 2 ) }}</dd>
                                <dt class="total-price">Total Price</dt><dd class="total-price-value">{{ $settings->currency }} {{ $booking->total_price }}</dd>
                            @elseif($booking->route == 'tour')
                                @if($booking->bookable != null)

                                <dt class="feature">Tour Package:</dt><dd class="value">{{$booking->bookable->service->name }}</dd>
                                <dt class="feature">Adults price:</dt><dd class="value">{{ $settings->currency }} {{$booking->bookable->adults.' x '.$booking->bookable->service->price_per_adult}}</dd>
                                <dt class="feature">Kids price:</dt><dd class="value">{{ $settings->currency }} {{$booking->bookable->kids.' x '.$booking->bookable->service->price_per_child}}</dd>
                                <dt class="feature">{{ $booking->bookable->total_days  }} Days Tour Package:</dt><dd class="value">{{ $settings->currency }} {{$booking->total_price}}</dd>
                                @endif

                                <dt class="feature">taxes and fees:</dt><dd class="value">{{ $booking->tax }}%</dd>
                                <dt class="total-price">Total Price</dt><dd class="total-price-value">{{ $settings->currency }} {{ ($booking->total_price*$booking->tax)/100+$booking->total_price}}.00</dd>
                            @endif
                        </dl>

                    </div>
                    <br/>
                    <div class="booking-details clearfix">

                        <h2>Payment History</h2>
                        <table  width="100%" class="table table-middle">
                            <thead>
                                <tr>
                                    <td class="center" style="border: 1px solid; text-align: center;">#</td>
                                    <td style="border: 1px solid; width: 60%;">Description</td>
                                    <td class="center" style="border: 1px solid; text-align: center;">Method</td>
                                    <td class="center" style="border: 1px solid; text-align: center;">Amount</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $deposit = 0; ?>
                            @foreach($booking->payment as $payment)
                                <tr>
                                    <td class="center" style="border: 1px solid; text-align: center;">#</td>
                                    <td style="border: 1px solid; width: 60%;">{{ $payment->description }}</td>
                                    <td class="center" style="border: 1px solid; text-align: center;">{{ $payment->type }}</td>
                                    <td class="center" style="border: 1px solid; text-align: center;">{{ $payment->amount }}</td>
                                </tr>
                                <?php $deposit = $deposit + $payment->amount ?>
                            @endforeach
                                <tr>
                                    <td class="center" style="border: 1px solid; text-align: center;"></td>
                                    <td style="border: 1px solid; width: 60%;"></td>
                                    <td class="center" style="border: 1px solid; text-align: center;">Total Deposit<hr/><span style="font-weight: bold;"> Due</span></td>
                                    <td class="center" style="border: 1px solid; text-align: center;">{{ $deposit }}<hr/><span style="font-weight: bold;"> {{ $booking->total_price - $deposit }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-md-6">
                            <div class="control-group">
                            {!! Form::open(['url'=>'admin/booking/payment/'.$booking->id]) !!}
                            {!! Form::hidden('bookable_id', $booking->id) !!}
                            <div class="form-group ">
                                <div class="selector" >
                                    {!! Form::select('type', ['Cash'=>'Cash', 'Check'=>'Check'], ['class' => 'full-width']) !!}
                                </div>
                            </div>
                            <div class="form-group ">
                                {!! Form::textarea('description', null, ['class' => 'full-width', 'placeholder'=>'Description']) !!}
                            </div>
                            <div class="form-group ">
                                {!! Form::text('amount', null, ['class' => 'full-width', 'placeholder'=>'Deposit Amount']) !!}
                            </div>
                            <button type="submit" class="btn-medium status full-width">UPDATE BOOKING</button>
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-sm-3 ">

                    {!! Form::model($booking, ['url'=>'admin/booking/'.$booking->id, 'method'=>'patch']) !!}


                        <div class="control-group">
                            <div class="form-group  no-padding">
                                <h4>Booking Status</h4>
                                <div class="selector" style="background-color: white;">
                                    {{--<select class="full-width">--}}
                                        {{--<option value="0">Open</option>--}}
                                        {{--<option value="1">Confirm</option>--}}
                                        {{--<option value="2">Cancel</option>--}}
                                        {{--<option value="3">Complete</option>--}}

                                    {{--</select>--}}
                                    {!! Form::select('status', $status, $booking->status, ['class' => 'full-width']) !!}
                                    {{--<span class="custom-select full-width" style="background-color: white;">{{ $status->status_name }}</span>--}}
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group  no-padding">
                                <h4 >Payment Process</h4>
                                <div class="selector" >
                                    {{--<select class="full-width">--}}
                                        {{--<option value="0">COD</option>--}}
                                        {{--<option value="1">bKash</option>--}}
                                        {{--<option value="2">Online Payment</option>--}}
                                        {{--</option>--}}
                                    {{--</select>--}}
                                    {!! Form::select('payment_method', $paymentMethod, null, ['class' => 'full-width']) !!}

                                    {{--<span class="custom-select full-width" style="background-color: white;">COD</span>--}}
                                </div>
                            </div>
                        </div>

                    @if($booking->bookingStatus != null)
                        @if($booking->bookingStatus->status_name == 'Confirmed' || $booking->bookingStatus->status_name == 'Complete')
                            {{--{{dd($booking->bookingStatus->status_name)}}--}}
                        <div class="control-group">
                            <div class="form-group  no-padding">
                                <h4 >Pin Code: {{($booking->pin_code)}}</h4>
                                <div class="selector" >
                                    {{--<select class="full-width">--}}
                                    {{--<option value="0">COD</option>--}}
                                    {{--<option value="1">bKash</option>--}}
                                    {{--<option value="2">Online Payment</option>--}}
                                    {{--</option>--}}
                                    {{--</select>--}}
                                    {{--{!! Form::select('payment_method', $paymentMethod, null, ['class' => 'full-width']) !!}--}}
                                    {{--@if($hotel->status == 1)--}}
                                        <a href="{{ url('admin/booking/detail/'.$booking->booking_no.'/pinEmail')  }}" class="button btn-mini blue">Send Pin Code</a>
                                        {{--<button type="button" class="btn btn-mini green">Active</button>--}}
                                    {{--@else--}}
                                    @if($booking->pincode_email == 0)
                                        <a href="#" class="button btn-mini red">Not Sent</a>
                                    @else
                                        <a href="#" class="button btn-mini green">Sent</a>
                                    @endif
                                        {{--<button type="button" class="btn btn-mini red">Inactive</button>--}}
                                    {{--@endif--}}
                                    {{--<span class="custom-select full-width" style="background-color: white;">COD</span>--}}
                                </div>
                            </div>
                        </div>
                        @endif

                    @endif


                    <div class="control-group">
                        <div class="form-group ">
                            {!! Form::label('customer_note', 'Customer notes:') !!}
                            {!! Form::textarea('customer_note', null, ['class' => 'col-sm-12']) !!}
                        </div>
                        <div class="form-group ">
                            {!! Form::label('staff_note', 'Saff notes:') !!}
                            {!! Form::textarea('staff_note', null, ['class' => 'col-sm-12']) !!}
                        </div>

                    </div>
                    <br/>
                    <button type="submit" class="btn-medium status full-width">UPDATE BOOKING</button>

                    {!! Form::close() !!}

                    <br>

                    <div class="sidebar-row">
                        <h4>Action</h4>
                        {!! Form::open(['url'=>'admin/booking/'.$booking->id, 'method'=>'DELETE']) !!}
                        <button
                                class="btn-mini red"
                                type="button"
                                data-toggle="modal"
                                data-target="#confirmDelete"
                                data-title="Delete {{ $booking->booking_no }} Booking"
                                data-message="Are you sure you want to delete this {{ $booking->booking_no }} Booking?"
                                >
                            <i class="glyphicon glyphicon-trash"></i> Delete
                        </button>
                        {!! Form::close() !!}
                        @include('common.delete-confirm')
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection