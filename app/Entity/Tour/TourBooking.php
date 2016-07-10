<?php namespace App\Entity\Tour;

use Illuminate\Database\Eloquent\Model;

class TourBooking extends Model {

	protected $table = 'tour_bookings';

    protected $fillable = [
        'booking_no',
        'tour_id',
        'adults',
        'kids',
        'child_ages',
        'date_from',
        'date_to',
        'total_days',
        'total_price',
        'pin_code'
    ];


    public function tour()
    {
        return $this->belongsTo('App\Entity\Tour\Tour', 'tour_id');
    }

    public function service()
    {
        return $this->belongsTo('App\Entity\Tour\Tour', 'tour_id');
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
