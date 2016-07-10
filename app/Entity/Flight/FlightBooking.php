<?php namespace App\Entity\Flight;

use Illuminate\Database\Eloquent\Model;

class FlightBooking extends Model {

    protected $table = 'flight_bookings';

    protected $fillable = [
        'booking_no',
        'flight_id',
        'first_name',
        'last_name',
        'passport_no',
        'date_of_birth',
        'address',
        'mobile',
        'pin_code'
    ];


    public function flight()
    {
        return $this->belongsTo('App\Entity\Flight\Flight', 'flight_id');
    }

    public function service()
    {
        return $this->belongsTo('App\Entity\Flight\Flight', 'flight_id');
    }

    public function user()
    {
        return $this->belongsTo('User', 'id', 'user_id');
    }

    public function bookingStatus()
    {
        return $this->hasOne('App\BookingStatus', 'status_id', 'status');
    }

    public function images() {
        return $this->morphMany('App\Images', 'imageable');
    }

    public function booking() {
        return $this->morphMany('App\Entity\Booking', 'bookable');
    }

}
