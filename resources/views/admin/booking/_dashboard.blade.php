
<h2>Trips You have booking!</h2>
<div class="filter-section gray-area clearfix">
    <form>
        <label class="radio radio-inline">
            <input type="radio" name="filter" checked="checked" />
            All Types
        </label>
        <label class="radio radio-inline">
            <input type="radio" name="filter" />
            Hotels
        </label>
        <label class="radio radio-inline">
            <input type="radio" name="filter" />
            Flights
        </label>
        <label class="radio radio-inline">
            <input type="radio" name="filter" />
            Cars
        </label>
        <label class="radio radio-inline">
            <input type="radio" name="filter" />
            Cruises
        </label>
        <div class="pull-right col-md-6 action">
            <h5 class="pull-left no-margin col-md-4">Sort results by:</h5>
            <button class="btn-small white gray-color">UPCOMING</button>
            <button class="btn-small white gray-color">CANCELLED</button>
        </div>
    </form>
</div>


<div class="booking-history">
    @foreach($bookings as $booking)


        <div class="booking-info clearfix">
            <div class="date">
                <label class="month">{{ date("M", strtotime($booking->bookable->created_at)) }}</label>
                <label class="date">{{ date("d", strtotime($booking->bookable->created_at)) }}</label>
                <label class="day">{{ date("D", strtotime($booking->bookable->created_at)) }}</label>
            </div>
            <h4 class="box-title"><i class="icon soap-icon-hotel yellow-color circle"></i>{{ $booking->bookable->hotel->name }}<small>{{ $booking->bookable->roomType->room_type }}</small></h4>
            <dl class="info">
                <dt>TRIP ID</dt>
                <dd>{{ $booking->bookable->booking_no }}</dd>
                <dt>booking on</dt>
                <dd>{{ date("l, M d, Y", strtotime($booking->bookable->created_at)) }}</dd>
            </dl>
            <button class="btn-mini status">DELETE</button>

            <button class="btn-mini status">{{ $booking->bookable->bookingStatus->status_name }}</button>
        </div>

    @endforeach
</div>

