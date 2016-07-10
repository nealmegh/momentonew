<?php namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model {

    protected $table = "booking";
    
    protected $fillable = [
        'user_id',
        'guest_id',
        'agent_id',
        'status',
        'other',
        'booking_no',
        'tax',
        'total_price',
        'currency_code',
        'exchange_rate',
        'deposit_price',
        'bookable_id',
        'bookable_type',
        'customer_note',
        'staff_note',
        'payment_method',
        'route'
    ];

    public function hotelBooking()
    {
        return $this->hasOne('App\Entity\Hotel\HotelBooking', 'booking_no', 'booking_no');
    }

    public function bookingStatus()
    {
        return $this->hasOne('App\BookingStatus', 'id', 'status');
    }

    public function bookable ()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function guest()
    {
        return $this->belongsTo('App\Entity\Guest', 'guest_id');
    }

    public function payment()
    {
        return $this->hasMany('App\Entity\PaymentHistory', 'bookable_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo('App\Entity\PaymentMethod', 'payment_method');
    }

    public function paymentInformation()
    {
        return $this->hasOne('App\Entity\PaymentInformation', 'payment_method');
    }

}
