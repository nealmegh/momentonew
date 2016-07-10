    <ul class="tabs">
        <li class="active"><a href="#flight-details" data-toggle="tab">Flight Details</a></li>
        <li><a href="#inflight-features" data-toggle="tab">Inflight Features</a></li>
        {{--<li><a href="#flgiht-seat-selection" data-toggle="tab">Seat Selection</a></li>--}}
        <li><a href="#flight-baggage" data-toggle="tab">Baggage</a></li>
        {{--<li><a href="#flight-fare-rules" data-toggle="tab">Fare Rules</a></li>--}}
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="flight-details">
            <div class="intro table-wrapper full-width hidden-table-sm box">
                <div class="col-md-4 table-cell travelo-box">
                    <dl class="term-description">
                        <dt>Airline:</dt><dd>{{ $flight->company_name }}</dd>
                        <dt>Flight Type:</dt><dd>{{ $flight->flight_type }}</dd>
                        <dt>Fare type:</dt><dd>{{ $flight->fare_type }}</dd>
                        <dt>Cancellation:</dt><dd>{{ $settings->currency.$flight->cancellation }} / person</dd>
                        <dt>Flight CHange:</dt><dd>{{ $settings->currency.$flight->flight_change }} / person</dd>
                        <dt>Seats &amp; Baggage:</dt><dd>{{ $flight->baggage }}</dd>
                        <dt>Inflight Features:</dt><dd>{{ $flight->flight_features }}</dd>
                        <dt>Base fare:</dt><dd>{{ $settings->currency.$flight->base_fare.'.00' }}</dd>
                        <dt>Taxes &amp; Fees:</dt><dd>{{ $settings->currency.$flight->tax.'.00' }}</dd>
                        <dt>total price:</dt><dd>{{ $settings->currency }}{{ $flight->base_fare + ($flight->base_fare*$flight->tax)/100 }}.00</dd>
                    </dl>
                </div>
                <div class="col-md-8 table-cell">
                    <div class="detailed-features booking-details">
                        <div class="travelo-box">
                            <a href="#" class="button btn-mini yellow pull-right">{{ (count($flight->schedule)-1 < 0) ? 0 : count($flight->schedule)-1   }} STOP</a>
                            <h4 class="box-title">{{ $flight->from }} to {{ $flight->to }}<small>{{ $flight->direction }} flight</small></h4>
                        </div>
                        <div class="table-wrapper flights">
                            @forelse($flight->schedule as $key=>$schedule)

                            <div class="table-row @if($key==0) first-flight @elseif($key==1) second-flight @endif">
                                <div class="table-cell logo">
                                    <img src="{{ url($logo->path.'/'.$logo->name) }}" alt="">
                                    <label><br/>{{ $schedule->flight_no }} {{ $flight->flight_type }}</label>
                                </div>
                                <div class="table-cell timing-detail">
                                    <div class="timing">
                                        <div class="check-in">
                                            <label>Take off</label>
                                            <span>{{ $schedule->take_of }}</span>
                                        </div>
                                        <div class="duration text-center">
                                            <i class="soap-icon-clock"></i>
                                            <span>{{ $schedule->duration }}</span>
                                        </div>
                                        <div class="check-out">
                                            <label>landing</label>
                                            <span>{{ $schedule->landing }}</span>
                                        </div>
                                    </div>
                                    @if($schedule->layover != null)
                                    <label class="layover">Layover : {{ $schedule->layover }}</label>
                                    @endif
                                </div>
                            </div>
                            @empty
                            <h4 style="text-align: center;">Schedule Not Found!</h4>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="long-description">
                <h2>About Delta Airlines</h2>
                {!! $flight->description !!}
            </div>
        </div>
        <div class="tab-pane fade" id="inflight-features">
            <h2>Features</h2>
            <p>Maecenas vitae turpis condimentum metus tincidunt semper bibendum ut orci. Donec eget accumsan est. Duis laoreet sagittis elit et vehicula. Cras viverra posuere condimentum. Donec urna arcu, venenatis quis augue sit amet, mattis gravida nunc. Integer faucibus, tortor a tristique adipiscing, arcu metus luctus libero, nec vulputate risus elit id nibh.</p>
            <ul class="amenities clearfix style1 box">
                @foreach($flight->facilities as $facility)
                <li class="col-md-4 col-sm-6">
                    <div class="icon-box style1"><i class="{{ $facility->icon }}"></i>{{ $facility->feature }}</div>
                </li>
                @endforeach
            </ul>

        </div>
        <div class="tab-pane fade" id="flight-baggage">

            <h2>Baggage</h2>
            <p>In this section you'll find information on baggage allowances, special equipment and sports items as well as restricted items. We've also included some tips to make your trip more enjoyable.</p>
            <div class="baggage column-5">
                <div class="icon-box style9">
                    <i class="soap-icon-carryon"></i>
                    <h5 class="box-title">Carry-on<br>Allowance</h5>
                </div>
                <div class="icon-box style9">
                    <i class="soap-icon-baggage"></i>
                    <h5 class="box-title">Baggage<br>Allowance</h5>
                </div>
                <div class="icon-box style9">
                    <i class="soap-icon-delayed-baggage"></i>
                    <h5 class="box-title">Delayed<br>Baggage</h5>
                </div>
                <div class="icon-box style9">
                    <i class="soap-icon-damaged-baggage"></i>
                    <h5 class="box-title">Damaged<br>Baggage</h5>
                </div>
                <div class="icon-box style9">
                    <i class="soap-icon-baggage-status"></i>
                    <h5 class="box-title">Baggage<br>Status</h5>
                </div>
                <div class="icon-box style9">
                    <i class="soap-icon-phone"></i>
                    <h5 class="box-title">Baggage<br>Services</h5>
                </div>
                <div class="icon-box style9">
                    <i class="soap-icon-status"></i>
                    <h5 class="box-title">Baggage<br>Tips</h5>
                </div>
                <div class="icon-box style9">
                    <i class="soap-icon-restricted"></i>
                    <h5 class="box-title">Restricted<br>Items</h5>
                </div>
                <div class="icon-box style9">
                    <i class="soap-icon-liability"></i>
                    <h5 class="box-title">Liability<br>Limitations</h5>
                </div>
                <div class="icon-box style9">
                    <i class="soap-icon-lost-found"></i>
                    <h5 class="box-title">Lost and<br>Found</h5>
                </div>
            </div>

            <hr>
            <h2>Basic Information</h2>
            <p>Sed aliquam nunc eget velit imperdiet, in rutrum mauris malesuada. Quisque ullamcorper vulputate nisi, et fringilla ante convallis quis. Nullam vel tellus non elit suscipit volutpat. Integer id felis et nibh rutrum dignissim ut non risus. In tincidunt urna quis sem luctus, sed accumsan magna pellentesque. Donec et iaculis tellus. Vestibulum ut iaculis justo, auctor sodales lectus. Donec et tellus tempus, dignissim maurornare, consequat lacus. Integer dui neque, scelerisque nec sollicitudin sit amet, sodales a erat. Duis vitae condimentum ligula. Integer eu mi nisl. Donec massa dui, commodo id arcu quis, venenatis scelerisque velit.</p>
        </div>
        {{--<div class="tab-pane fade" id="flight-fare-rules">--}}
            {{--<h2>Fare Rules for your Flight</h2>--}}
            {{--<div class="topics">--}}
                {{--<ul class="check-square clearfix">--}}
                    {{--<li class="col-sm-6 col-md-4"><a href="#">Rules and Policies</a></li>--}}
                    {{--<li class="col-sm-6 col-md-4"><a href="#">Flight Changes</a></li>--}}
                    {{--<li class="col-sm-6 col-md-4"><a href="#">refunds</a></li>--}}
                    {{--<li class="col-sm-6 col-md-4"><a href="#">Airline Penalties</a></li>--}}
                    {{--<li class="col-sm-6 col-md-4 active"><a href="#">Flight Cancellation</a></li>--}}
                    {{--<li class="col-sm-6 col-md-4"><a href="#">Airline terms of use</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<p>Maecenas vitae turpis condimentum metus tincidunt semper bibendum ut orci. Donec eget accumsan est. Duis laoreet sagittis elit et vehicula. Cras viverra posuere condimentum. Donec urna arcu, venenatis quis augue sit amet, mattis gravida nunc. Integer faucibus, tortor a tristique adipiscing, arcu metus luctus libero, nec vulputate risus elit id nibh.</p>--}}
            {{--<div class="toggle-container">--}}
                {{--<div class="panel style1 arrow-right">--}}
                    {{--<h4 class="panel-title">--}}
                        {{--<a class="collapsed" href="#question1" data-toggle="collapse">Flight cancellation charges</a>--}}
                    {{--</h4>--}}
                    {{--<div class="panel-collapse collapse" id="question1">--}}
                        {{--<div class="panel-content">--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="panel style1 arrow-right">--}}
                    {{--<h4 class="panel-title">--}}
                        {{--<a class="collapsed" href="#question2" data-toggle="collapse">WAmendment in higher class charges</a>--}}
                    {{--</h4>--}}
                    {{--<div class="panel-collapse collapse" id="question2">--}}
                        {{--<div class="panel-content">--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="panel style1 arrow-right">--}}
                    {{--<h4 class="panel-title">--}}
                        {{--<a class="" href="#question3" data-toggle="collapse">Amendment in same class charges</a>--}}
                    {{--</h4>--}}
                    {{--<div class="panel-collapse collapse in" id="question3">--}}
                        {{--<div class="panel-content">--}}
                            {{--<p>Sed a justo enim. Vivamus volutpat ipsum ultrices augue porta lacinia. Proin in elementum enim. <span class="skin-color">Duis suscipit justo</span> non purus consequat molestie. Etiam pharetra ipsum sagittis sollicitudin ultricies. Praesent luctus, diam ut tempus aliquam, diam ante euismod risus, euismod viverra quam quam eget turpis. Nam <span class="skin-color">tristique congue</span> arcu, id bibendum diam. Ut hendrerit, leo a pellentesque porttitor, purus arcu tristique erat, in faucibus elit leo in turpis vitae luctus enim, a mollis nulla.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="panel style1 arrow-right">--}}
                    {{--<h4 class="panel-title">--}}
                        {{--<a class="collapsed" href="#question4" data-toggle="collapse">Rebooking/cancellation charges</a>--}}
                    {{--</h4>--}}
                    {{--<div class="panel-collapse collapse" id="question4">--}}
                        {{--<div class="panel-content">--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="panel style1 arrow-right">--}}
                    {{--<h4 class="panel-title">--}}
                        {{--<a class="collapsed" href="#question5" data-toggle="collapse">Canellation through the customer support</a>--}}
                    {{--</h4>--}}
                    {{--<div class="panel-collapse collapse" id="question5">--}}
                        {{--<div class="panel-content">--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="panel style1 arrow-right">--}}
                    {{--<h4 class="panel-title">--}}
                        {{--<a class="collapsed" href="#question6" data-toggle="collapse">Do we accept cancellations through email?</a>--}}
                    {{--</h4>--}}
                    {{--<div class="panel-collapse collapse" id="question6">--}}
                        {{--<div class="panel-content">--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="panel style1 arrow-right">--}}
                    {{--<h4 class="panel-title">--}}
                        {{--<a class="collapsed" href="#question7" data-toggle="collapse">What is the minimum day limit of cancellation?</a>--}}
                    {{--</h4>--}}
                    {{--<div class="panel-collapse collapse" id="question7">--}}
                        {{--<div class="panel-content">--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    </div>