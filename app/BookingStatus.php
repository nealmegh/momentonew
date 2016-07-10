<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model {

    protected $table = 'booking_statuses';

    public function hotelBooking()
    {
        return $this->belongsTo('App\Entity\Hotel\HotelBooking', 'status');
    }

}
