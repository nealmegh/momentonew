<?php namespace App\Entity\Car;

use Illuminate\Database\Eloquent\Model;

class CarBooking extends Model {

    protected $table = 'car_bookings';

    protected $fillable = [
        'booking_no',
        'car_id',
        'adults',
        'kids',
        'date_from',
        'date_to',
        'total_days',
        'total_price',
        'pin_code'
    ];


    public function car()
    {
        return $this->belongsTo('App\Entity\Car\Car', 'car_id');
    }

    public function service()
    {
        return $this->belongsTo('App\Entity\Car\Car', 'car_id');
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
