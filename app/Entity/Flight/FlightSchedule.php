<?php namespace App\Entity\Flight;

use Illuminate\Database\Eloquent\Model;

class FlightSchedule extends Model {

    protected $table = 'flight_schedules';

    protected $fillable = [
        'flight_id',
        'flight_no',
        'take_of',
        'landing',
        'duration',
        'layover'
    ];

    public function tour() {
        return $this->belongsTo('App\Entity\Car\Car', 'id', 'car_id');
    }

}
