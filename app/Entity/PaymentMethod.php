<?php namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model {

	protected $table = 'payment_methods';

    protected $fillable = [
        'name',
        'terms'
    ];

    public function booking()
    {
        return $this->hasMany('App\Entity\Booking', 'payment_method');
    }

}
