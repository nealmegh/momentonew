<?php namespace App\Entity\Flight;

use Illuminate\Database\Eloquent\Model;

class FlightFacility extends Model {

    protected $table = 'flight_facilities';

    protected $fillable = [
        'flight_id',
        'feature',
        'icon'
    ];

    public function tour() {
        return $this->belongsTo('App\Entity\Flight\Flight',  'flight_id');
    }

}
