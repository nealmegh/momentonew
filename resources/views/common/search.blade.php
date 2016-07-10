<div class="search-box-wrapper">
    <div class="search-box container">
        <ul class="search-tabs clearfix">
            <li class="{{ ($active == 'hotel') ? 'active' : '' }}"><a href="#hotels-tab" data-toggle="tab">HOTELS</a></li>
            <li class="{{ ($active == 'tour') ? 'active' : '' }}"><a href="#tours-tab" data-toggle="tab">TOURS</a></li>
            <li class="{{ ($active == 'car') ? 'active' : '' }}"><a href="#cars-tab" data-toggle="tab">CARS</a></li>
{{--            <li class="{{ ($active == 'flight') ? 'active' : '' }}"><a href="#flights-tab" data-toggle="tab">FLIGHTS</a></li>--}}
            <li><a href="#online-checkin-tab" data-toggle="tab">BOOKING CHECK</a></li>
        </ul>
        <div class="visible-mobile">
            <ul id="mobile-search-tabs" class="search-tabs clearfix">
                <li class="{{ ($active == 'hotel') ? 'active' : '' }}"><a href="#hotels-tab">HOTELS</a></li>
                <li class="{{ ($active == 'tour') ? 'active' : '' }}"><a href="#tours-tab">TOURS</a></li>
                <li class="{{ ($active == 'car') ? 'active' : '' }}"><a href="#cars-tab">CARS</a></li>
{{--                <li class="{{ ($active == 'flight') ? 'active' : '' }}"><a href="#flights-tab">FLIGHTS</a></li>--}}
                <li><a href="#online-checkin-tab">ONLINE CHECK IN</a></li>
            </ul>
        </div>
        <div class="search-tab-content">
            <div class="tab-pane fade {{ ($active == 'hotel') ? 'active in' : '' }}" id="hotels-tab">
                {!! Form::open(['url'=>'hotels/search/result', 'method' => 'get']) !!}
                    <div class="row">
                        <div class="form-group col-sm-6 col-md-3">
                            <h4 class="title">Where</h4>
                            <label for="searchable">Your Destination</label>
                            {!! Form::text('auto',$value = null, array('class' => 'input-text full-width', 'placeholder' => 'enter a destination or hotel name', 'id' => 'auto')) !!}
                        </div>

                        <div class="form-group col-sm-6 col-md-4">
                            <h4 class="title">When</h4>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Check In</label>
                                    <div class="datepicker-wrap">
                                        {!! Form::text('date_from', null, ['class' => 'input-text full-width', 'placeholder' => 'mm/dd/yy']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <label>Check Out</label>
                                    <div class="datepicker-wrap">
                                        {!! Form::text('date_to', null, ['class' => 'input-text full-width', 'placeholder' => 'mm/dd/yy']) !!}

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <h4 class="title">Who</h4>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label>Rooms</label>
                                    <div class="selector">
                                        {!! Form::selectRange('num_of_room', 01, 05, null, ['class' => 'full-width']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <label>Adults</label>
                                    <div class="selector">
                                        {!! Form::selectRange('num_of_adult', 01, 05, null, ['class' => 'full-width']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <label>Kids</label>
                                    <div class="selector">
                                        {!! Form::selectRange('num_of_child', 00, 05, null, ['class' => 'full-width']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-6 col-md-2 fixheight">
                            <label class="hidden-xs">&nbsp;</label>
                            <button type="submit" class="full-width icon-check animated" data-animation-type="bounce" data-animation-duration="1">SEARCH NOW</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>

            {{--<div class="tab-pane fade {{ ($active == 'flight') ? 'active in' : '' }}" id="flights-tab">--}}
                {{--{!! Form::open(['url'=>'flights/search/result', 'method' => 'get']) !!}--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-4">--}}
                            {{--<h4 class="title">Where</h4>--}}
                            {{--<div class="form-group">--}}
                                {{--<label>Leaving From</label>--}}
                                {{--<input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label>Going To</label>--}}
                                {{--<input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-md-4">--}}
                            {{--<h4 class="title">When</h4>--}}
                            {{--<label>Departing On</label>--}}
                            {{--<div class="form-group row">--}}
                                {{--<div class="col-xs-6">--}}
                                    {{--<div class="datepicker-wrap">--}}
                                        {{--<input type="text" class="input-text full-width" placeholder="mm/dd/yy" />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-6">--}}
                                    {{--<div class="selector">--}}
                                        {{--<select class="full-width">--}}
                                            {{--<option value="1">anytime</option>--}}
                                            {{--<option value="2">morning</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<label>Arriving On</label>--}}
                            {{--<div class="form-group row">--}}
                                {{--<div class="col-xs-6">--}}
                                    {{--<div class="datepicker-wrap">--}}
                                        {{--<input type="text" class="input-text full-width" placeholder="mm/dd/yy" />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-6">--}}
                                    {{--<div class="selector">--}}
                                        {{--<select class="full-width">--}}
                                            {{--<option value="1">anytime</option>--}}
                                            {{--<option value="2">morning</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-md-4">--}}
                            {{--<h4 class="title">Who</h4>--}}
                            {{--<div class="form-group row">--}}
                                {{--<div class="col-xs-3">--}}
                                    {{--<label>Adults</label>--}}
                                    {{--<div class="selector">--}}
                                        {{--<select class="full-width">--}}
                                            {{--<option value="1">01</option>--}}
                                            {{--<option value="2">02</option>--}}
                                            {{--<option value="3">03</option>--}}
                                            {{--<option value="4">04</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-3">--}}
                                    {{--<label>Kids</label>--}}
                                    {{--<div class="selector">--}}
                                        {{--<select class="full-width">--}}
                                            {{--<option value="0">00</option>--}}
                                            {{--<option value="1">01</option>--}}
                                            {{--<option value="2">02</option>--}}
                                            {{--<option value="3">03</option>--}}
                                            {{--<option value="4">04</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-6">--}}
                                    {{--<label>Promo Code</label>--}}
                                    {{--<input type="text" class="input-text full-width" placeholder="type here" />--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group row">--}}
                                {{--<div class="col-xs-3">--}}
                                    {{--<label>Infants</label>--}}
                                    {{--<div class="selector">--}}
                                        {{--<select class="full-width">--}}
                                            {{--<option value="1">01</option>--}}
                                            {{--<option value="2">02</option>--}}
                                            {{--<option value="3">03</option>--}}
                                            {{--<option value="4">04</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-6 pull-right">--}}
                                    {{--<label>&nbsp;</label>--}}
                                    {{--<button class="full-width icon-check">SERACH NOW</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}

            <div class="tab-pane fade {{ ($active == 'tour') ? 'active in' : '' }}" id="tours-tab">
                {!! Form::open(['url'=>'tours/search/result', 'method' => 'get']) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="title">Where</h4>
                            {{--<div class="form-group">--}}
                                {{--<label>Leaving From</label>--}}
                                {{--<input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label>Going To</label>
                                {!! Form::text('tour',$value = null, array('class' => 'input-text full-width', 'placeholder' => 'enter a destination', 'id' => 'tour')) !!}
                                {{--<input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />--}}
                            </div>
                        </div>


                        <div class="form-group col-sm-6 col-md-4">
                            <h4 class="title">When</h4>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Departure On </label>
                                    <div class="datepicker-wrap">
                                        {!! Form::text('date_from', null, ['class' => 'input-text full-width', 'placeholder' => 'mm/dd/yy']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <label>Arriving On</label>
                                    <div class="datepicker-wrap">
                                        {!! Form::text('date_to', null, ['class' => 'input-text full-width', 'placeholder' => 'mm/dd/yy']) !!}

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--<div class="col-md-4">--}}
                            {{--<h4 class="title">When</h4>--}}
                            {{--<label>Departing On</label>--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="col-xs-6">--}}
                                    {{--<div class="datepicker-wrap">--}}
                                        {{--<input type="text" class="input-text full-width" placeholder="mm/dd/yy" />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<label>Arriving On</label>--}}
                                {{--<div class="col-xs-6">--}}
                                    {{--<div class="selector">--}}
                                        {{--<select class="full-width">--}}
                                            {{--<option value="1">anytime</option>--}}
                                            {{--<option value="2">morning</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                    {{--bipon--}}

                                    {{--<div class="datepicker-wrap">--}}
                                        {{--<input type="text" class="input-text full-width" placeholder="mm/dd/yy" />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<label>Arriving On</label>--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="col-xs-6">--}}
                                    {{--<div class="datepicker-wrap">--}}
                                        {{--<input type="text" class="input-text full-width" placeholder="mm/dd/yy" />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-6">--}}
                                    {{--<div class="selector">--}}
                                        {{--<select class="full-width">--}}
                                            {{--<option value="1">anytime</option>--}}
                                            {{--<option value="2">morning</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="col-md-4">
                            <h4 class="title">Who</h4>
                            <div class="form-group row">
                                <div class="col-xs-3">
                                    <label>Adults</label>
                                    <div class="selector">
                                        <select class="full-width">
                                            <option value="1">01</option>
                                            <option value="2">02</option>
                                            <option value="3">03</option>
                                            <option value="4">04</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <label>Kids</label>
                                    <div class="selector">
                                        <select class="full-width">
                                            <option value="0">00</option>
                                            <option value="1">01</option>
                                            <option value="2">02</option>
                                            <option value="3">03</option>
                                            <option value="4">04</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                {{--<div class="col-xs-6 pull-right">--}}
                                    <label>&nbsp;</label>
                                    <button class="full-width icon-check">SERACH NOW</button>
                                </div>
                                    {{--<label>Promo Code</label>--}}
                                    {{--<input type="text" class="input-text full-width" placeholder="type here" />--}}
                                {{--</div>--}}
                            </div>
                            <div class="form-group row">
                                {{--<div class="col-xs-3">--}}
                                    {{--<label>Rooms</label>--}}
                                    {{--<div class="selector">--}}
                                        {{--<select class="full-width">--}}
                                            {{--<option value="1">01</option>--}}
                                            {{--<option value="2">02</option>--}}
                                            {{--<option value="3">03</option>--}}
                                            {{--<option value="4">04</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-6 pull-right">--}}
                                    {{--<label>&nbsp;</label>--}}
                                    {{--<button class="full-width icon-check">SERACH NOW</button>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="tab-pane fade {{ ($active == 'car') ? 'active in' : '' }}" id="cars-tab">
                {!! Form::open(['url'=>'cars/search/result', 'method' => 'get']) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="title">Where</h4>
                            <div class="form-group">
                                <label>Pick Up</label>
                                {{--{!! Form::text('pick_up_location', null, ['class' => 'input-text full-width', 'placeholder' => 'city, distirct or specific airport']) !!}--}}
                                {!! Form::text('carPick',$value = null, array('class' => 'input-text full-width', 'placeholder' => 'enter a destination', 'id' => 'carPick')) !!}

                            </div>
                            <div class="form-group">
                                <label>Drop Off</label>
                                {{--<input name="drop_off_location" type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />--}}
                                {!! Form::text('carDrop',$value = null, array('class' => 'input-text full-width', 'placeholder' => 'enter a destination', 'id' => 'carDrop')) !!}

                            </div>
                        </div>

                        <div class="col-md-4">
                            <h4 class="title">When</h4>
                            <div class="form-group">
                                <label>Pick-Up Date / Time</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="datepicker-wrap">
                                            <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">anytime</option>
                                                <option value="2">morning</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Drop-Off Date / Time</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="datepicker-wrap">
                                            <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">anytime</option>
                                                <option value="2">morning</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h4 class="title">Who</h4>
                            <div class="form-group row">
                                <div class="col-xs-3">
                                    <label>Adults</label>
                                    <div class="selector">
                                        <select name="adult" class="full-width">
                                            <option value="1">01</option>
                                            <option value="2">02</option>
                                            <option value="3">03</option>
                                            <option value="4">04</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <label>Kids</label>
                                    <div class="selector">
                                        <select name="kids" class="full-width">
                                            <option value="1">01</option>
                                            <option value="2">02</option>
                                            <option value="3">03</option>
                                            <option value="4">04</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <label>Promo Code</label>
                                    <input type="text" class="input-text full-width" placeholder="type here" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <label>Car Type</label>
                                    <div class="selector">
                                        {!! form::select('type', ['Economy'=>'Economy', 'Luxury'=>'Luxury', 'Intermediate'=>'Intermediate'], null,['class'=>' full-width']) !!}

                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <label>&nbsp;</label>
                                    <button class="full-width icon-check">SERACH NOW</button>
                                </div>
                            </div>
                            </div>
                        </div>
                {!! Form::close() !!}
            </div>

            <div class="tab-pane fade" id="online-checkin-tab">
                <form method="GET" action="/check-bookings/confirmation" accept-charset="UTF-8">
                    <div class="row">
                        <div class="form-group col-sm-6 col-md-8">
                            <h4 class="title">Booking Check</h4>
                            <label>Check your booking status</label>
                            <input class="input-text full-width" placeholder="Enter Your 16 digit Booking No." name="booking_no" type="text">
                        </div>



                        <div class="form-group col-sm-6 col-md-4 fixheight">
                            <label class="hidden-xs">&nbsp;</label>
                            <button type="submit" class="full-width icon-check animated" data-animation-type="bounce" data-animation-duration="1">SEARCH NOW</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
       $('input:text').bind({
        });

        $("#auto").autocomplete({
            minLength:1,
            autoFocus: true,
            source: '{{URL('getdata/hotel?id=hotel')}}'
        });
        $("#tour").autocomplete({
            minLength:1,
            autoFocus: true,
            source: '{{URL('getdata/tour?id=tour&')}}'
        });
        $("#carPick").autocomplete({
            minLength:1,
            autoFocus: true,
            source: '{{URL('getdata/tour?id=car&')}}'
        });
        $("#carDrop").autocomplete({
            minLength:1,
            autoFocus: true,
            source: '{{URL('getdata/tour?id=car&')}}'
        });
    });
</script>