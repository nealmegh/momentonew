<?php namespace App\Entity\Agent;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model {

    protected $table = "agents";

    protected $fillable = [
        'user_id',
        'hotel_id',
        'status'
    ];

//    public function hotels()
//    {
//        return $this->hasMany('App\Entity\Hotel\Hotel', 'id', 'hotel_id');
//    }

    public function hotelInfo()
    {
        return $this->belongsTo('App\Entity\Hotel\Hotel', 'hotel_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function hotelBookings()
    {
        return $this->hasMany('App\Entity\Hotel\HotelBooking', 'hotel_id', 'hotel_id');
    }

    public function agentMarkup()
    {
        return $this->hasOne('App\Entity\Agent\AgentsMarkup','agent_id');
    }

}
