    <ul class="tabs">
        <li class="active">
            <a href="#car-details" data-toggle="tab">Car Details</a>
        </li>
    </ul>
    <div class="tab-content">

        <div class="tab-pane fade in active" id="car-details">
            <div class="" id="hotel-availability">

                {!! Form::open(['url'=>'cars/booking', 'method'=>'GET', 'id'=>'']) !!}
                {!! Form::hidden('car', $car->id) !!}
                <div class="update-search clearfix">
                    <div class="col-md-5">
                        <h4 class="title">When</h4>
                        <div class="row">
                            <div class="col-xs-6">
                                <label>CHECK IN</label>
                                <div class="datepicker-wrap">
                                    {!! Form::text('date_from', Input::get('date_from'), ['class' => 'input-text full-width', 'placeholder' => 'mm/dd/yy']) !!}
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <label>CHECK OUT</label>
                                <div class="datepicker-wrap">
                                    {!! Form::text('date_to', Input::get('date_to'), ['class' => 'input-text full-width', 'placeholder' => 'mm/dd/yy']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h4 class="title">Who</h4>
                        <div class="row">
                            <div class="col-xs-4">
                                <label>CAR TYPE</label>
                                <div class="selector">
                                    {!! Form::select('type', ['1'=>'01', '2' => '02', '3' => '03', '4' => '04', '5' => '05'], Input::get('num_of_room'), ['class' => 'full-width'] ) !!}
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <label>ADULTS</label>
                                <div class="selector">
                                    {!! Form::select('adult', ['1'=>'01', '2' => '02', '3' => '03', '4' => '04', '5' => '05'], Input::get('num_of_adult'), ['class' => 'full-width'] ) !!}

                                </div>
                            </div>
                            <div class="col-xs-4">
                                <label>KIDS</label>
                                <div class="selector">
                                    {!! Form::select('kids', ['0'=>'00', '1'=>'01', '2' => '02', '3' => '03', '4' => '04', '5' => '05'], Input::get('num_of_child'), ['class' => 'full-width'] ) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <h4 class="visible-md visible-lg">&nbsp;</h4>
                        <label class="visible-md visible-lg">&nbsp;</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <button data-animation-duration="1" data-animation-type="bounce" class="full-width icon-check animated" type="submit">Book Request</button>
                            </div>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}


            </div>
            <div class="intro box table-wrapper full-width hidden-table-sms">
                <div class="col-sm-4 table-cell travelo-box">
                    <dl class="term-description">
                        <dt>Rental Company:</dt><dd>{{ $car->company }}</dd>
                        <dt>Car Type:</dt><dd>{{ $car->type }}</dd>
                        <dt>Car name:</dt><dd>{{ $car->name }}</dd>
                        <dt>Passenger:</dt><dd>{{ $car->passenger }}</dd>
                        <dt>Baggage:</dt><dd>{{ $car->baggage }}</dd>
                        <dt>Car features:</dt><dd>{{ $car->car_features }}
                        <dt>Hourly price:</dt><dd>{{ $settings->currency.' '.$car->hourly_price  }}</dd>
                        <dt>Whole day price:</dt><dd>{{ $settings->currency.' '.$car->whole_day_price  }}</dd>

                    </dl>
                </div>
                <div class="col-sm-8 table-cell">
                    <div class="detailed-features clearfix">
                        <div class="col-md-6">
                            <h4 class="box-title">
                                Pick-up location details
                                <small>information</small>
                            </h4>
                            <div class="icon-box style11">
                                <div class="icon-wrapper">
                                    <i class="soap-icon-clock"></i>
                                </div>
                                <dl class="details">
                                    <dt class="skin-color">pickup time</dt>
                                    <dd>{{ $car->pick_up_time }}</dd>
                                </dl>
                            </div>
                            <div class="icon-box style11">
                                <div class="icon-wrapper">
                                    <i class="soap-icon-departure"></i>
                                </div>
                                <dl class="details">
                                    <dt class="skin-color">Location</dt>
                                    <dd>{{ $car->pick_up_location }}</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="box-title">
                                Drop-off location details
                                <small>information</small>
                            </h4>
                            <div class="icon-box style11">
                                <div class="icon-wrapper">
                                    <i class="soap-icon-clock"></i>
                                </div>
                                <dl class="details">
                                    <dt class="skin-color">Drop off Time</dt>
                                    <dd>{{ $car->drop_off_time }} </dd>
                                </dl>
                            </div>
                            <div class="icon-box style11">
                                <div class="icon-wrapper">
                                    <i class="soap-icon-departure"></i>
                                </div>
                                <dl class="details">
                                    <dt class="skin-color">Location</dt>
                                    <dd>{{ $car->drop_off_location }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2>Car Rental Information</h2>
            {!! $car->description !!}
            <br />
            <div class="car-features box">
                <div class="row add-clearfix">
                    @foreach($car->facilities as $facility)
                    <div class="col-sms-6 col-sm-6 col-md-4">
                        <span class="icon-box style2">
                             <i class="{{ $facility->icon }} circle"></i>{{ $facility->feature }}
                        </span>
                    </div>
                    @endforeach

                </div>
            </div>


        </div>

    </div>
