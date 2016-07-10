<?php namespace App\Entity\Hotel;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model {

    protected $table = "hotel_facility";
    public $timestamps = false;

    protected $fillable = array('hotel_id', 'facility_type_id');

    public function hotel()
    {
        return $this->belongsTo('App\Entity\Hotel\Hotel');
    }

    public function facilityType()
    {
        return $this->belongsTo('App\Entity\FacilityType', 'facility_type_id', 'id');
    }

}
