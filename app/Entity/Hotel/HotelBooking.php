<?php namespace App\Entity\Hotel;

use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model {

    protected $table = "hotel_booking";
    
    protected $fillable = [
        'special_requirements',
        'hotel_id',
        'hotel_room_group_id',
        'rooms',
        'adults',
        'kids',
        'child_ages',
        'room_price',
        'date_from',
        'date_to',
        'pin_code',
        'booking_no',
        'status',
        'mail_sent',
        'other'
    ];

    public function roomType ()
    {
        return $this->belongsTo('App\Entity\Hotel\Room\RoomType', 'hotel_room_group_id');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Entity\Hotel\Hotel', 'hotel_id');
    }

    public function service()
    {
        return $this->belongsTo('App\Entity\Hotel\Hotel', 'hotel_id');
    }

    public function user()
    {
        return $this->belongsTo('User', 'id', 'user_id');
    }

    public function bookingStatus()
    {
        return $this->hasOne('App\BookingStatus', 'status_id', 'status');
    }

    public function images()
    {
        return $this->morphMany('App\Images', 'imageable');
    }

    public function booking()
    {
        return $this->morphMany('App\Entity\Booking', 'bookable');
    }

    public function agent()
    {
        return $this->belongsTo('App\Entity\Agent\Agent', 'hotel_id', 'hotel_id');
    }

}
