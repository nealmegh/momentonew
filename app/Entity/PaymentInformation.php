<?php namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class PaymentInformation extends Model {

	protected $table = 'payment_information';

    protected $fillable = [
        'booking_no',
        'payment_method',
        'phone_no',
        'transaction_no'
    ];

    public function booking()
    {
        return $this->hasMany('App\Entity\Booking', 'payment_method');
    }

}
