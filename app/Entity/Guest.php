<?php namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model {

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'country_code', //new add
        'phone_no',
        'birth_date',
        'address',
        'city',
        'zip',
        'country'
    ];


    public function booking()
    {
        return $this->hasOne('App\Entity\Booking', 'guest_id');
    }

}
