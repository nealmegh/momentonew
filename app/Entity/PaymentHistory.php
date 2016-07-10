<?php namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model {

    protected $table = 'payment_histories';

    protected $fillable = [
        'bookable_id',
        'type',
        'description',
        'amount'
    ];

    public function booking()
    {
        return $this->belongsTo('App\Entity\Booking', 'bookable_id');
    }

}
