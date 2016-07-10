    <h2>Trips You have booking!</h2>
    <div class="filter-section gray-area clearfix">
        <form>
            <label class="radio radio-inline">
                <input type="radio" class="filter" id="all" name="filter" checked="checked" />  All Types
            </label>
            <label class="radio radio-inline">
                <input type="radio" class="filter" id="hotel" name="filter" />
                Hotels
            </label>
            <label class="radio radio-inline">
                <input type="radio" class="filter" id="tour" name="filter" />
                Tours
            </label>
            <label class="radio radio-inline">
                <input type="radio" class="filter" id="car" name="filter" />
                Cars
            </label>
            <label class="radio radio-inline">
                <input type="radio" class="filter" id="flight" name="filter" />
                Flights
            </label>
            <div class="pull-right col-md-6 action">
                <h5 class="pull-left no-margin col-md-4">Sort results by:</h5>
                <button class="btn-small white gray-color">UPCOMING</button>
                <button class="btn-small white gray-color">CANCELLED</button>
            </div>
        </form>
    </div>

   
    <div id="parent" class="booking-history">
         @foreach($bookings as $booking)


        <div class="booking-info clearfix {{$booking->route}} ">
            <div class="date">
                <label class="month">{{ date("M", strtotime($booking->created_at)) }}</label>
                <label class="date">{{ date("d", strtotime($booking->created_at)) }}</label>
                <label class="day">{{ date("D", strtotime($booking->created_at)) }}</label>
            </div>
            <h4 class="box-title">
                <a href="{{ url('admin/booking/detail/'.$booking->booking_no) }}">
                    @if($booking->route == 'hotel')
                        <i class="icon soap-icon-hotel blue-color circle"></i>
                        @if(isset($booking->bookable->hotel->name))
                            {{ $booking->bookable->hotel->name }}
                        @else
                            Hotel Deleted
                        @endif

                    @elseif($booking->route == 'tour')
                        <i class="icon soap-icon-baggage green-color circle"></i>
                        @if(isset($booking->bookable->tour->name))
                            {{ $booking->bookable->tour->name }}
                        @endif
                    @endif

                <small>{{ $booking->guest->first_name.' '.$booking->guest->last_name  }}</small>
                </a>
            </h4>
            <dl class="info">
                <dt>TRIP ID</dt>
                <dd>{{ $booking->booking_no }}</dd>
                <dt>booking on</dt>
                <dd>{{ date("l, M d, Y", strtotime($booking->created_at)) }}</dd>
            </dl>

            <button class="btn-mini status">@if( isset($booking->bookingStatus->status_name) ) {{ $booking->bookingStatus->status_name }} @endif</button>
        </div>

        @endforeach



    </div>
     <div>

         {!!$bookings->render()!!}
     </div>

    {{--filtering by Bipon--}}
    <script>
        var $btns = $('.filter').click(function() {
            if (this.id == 'all') {
                $('#parent > div').fadeIn(450);
            } else {
                var $el = $('.' + this.id).fadeIn(450);
                $('#parent > div').not($el).hide();
            }
            $btns.removeClass('active');
            $(this).addClass('active');
        })
    </script>