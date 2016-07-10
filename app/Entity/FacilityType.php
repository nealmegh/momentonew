<?php namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class FacilityType extends Model {

	protected $table = "facility_type";

    protected $fillable = [
        'name',
        'icon'
    ];

    protected $guarded = [
        '_method',
        '_token'
    ];

    public function hotel()
    {
        return $this->belongsToMany('App\Entity\Hotel\Hotel', 'hotel_facility');
    }

    public function roomTypes ()
    {
        return $this->hasMany('App\Entity\Hotel\Room\RoomGroupFacility', 'facility_type_id', 'id');
    }


}
