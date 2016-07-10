<?php namespace App\Entity\Hotel\Room;

use Illuminate\Database\Eloquent\Model;

class RoomGroupFacility extends Model {

    protected $table = "hotel_room_group_facilities";

    protected $fillable = [
        'hotel_room_group_id',
        'facility_type_id'
    ];

    public function roomTypes ()
    {
        return $this->hasMany('App\Entity\Hotel\Room\RoomType', 'id', 'hotel_room_group_id');
    }

    public function facilityTitle ()
    {
        return $this->belongsTo('App\Entity\FacilityType', 'facility_type_id');
    }


}
