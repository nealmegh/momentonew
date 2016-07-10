<?php namespace App\Entity\Hotel\Room;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model {

    protected $table = "hotel_room_group";

    protected $fillable = [
        'hotel_id',
        'room_type',
        'check_in_time',
        'check_out_time',
        'adult_allowed',
        'child_allowed',
        'total_bed',
        'extra_bed',
        'extra_bed_charge',
        'price',
        'description'
    ];

    public function hotel ()
    {
        return $this->belongsTo('App\Entity\Hotel\Hotel');
    }

    public function rooms()
    {
        return $this->hasMany('App\Entity\Hotel\Room\Room', 'hotel_room_group_id');
    }

    public function facilities ()
    {
        return $this->hasMany('App\Entity\Hotel\Room\RoomGroupFacility', 'hotel_room_group_id', 'id');
    }

    public function booking()
    {
        return $this->hasMany('App\Entity\Hotel\HotelBooking',  'hotel_room_group_id');
    }

    public function roomImage()
    {
        return $this->morphOne('App\Images', 'imageable');
    }

}
