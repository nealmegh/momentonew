<?php namespace App\Entity\Hotel\Room;

use Illuminate\Database\Eloquent\Model;

class Room extends Model {

    protected $table = "hotel_room";

    protected $fillable = [
        'date_from',
        'date_to',
        'hotel_id',
        'hotel_room_group_id',
        'total_available_room',
        'room_number',
        'price_per_room',
        'child_price',
        'other'
    ];

    protected $dates = [
        'date'
    ];

    public function hotel ()
    {
        return $this->belongsTo('App\Entity\Hotel\Hotel');
    }

    public function roomType ()
    {
        return $this->belongsTo('App\Entity\Hotel\Room\RoomType', 'hotel_room_group_id', 'id');
    }


}
