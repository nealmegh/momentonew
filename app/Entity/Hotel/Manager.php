<?php namespace App\Entity\Hotel;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model {

	protected $table = "hotel_manager";

    protected $fillable = array('user_id', 'hotel_id');

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Entity\Hotel\Hotel', 'hotel_id');
    }
}
