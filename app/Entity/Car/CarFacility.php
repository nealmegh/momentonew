<?php namespace App\Entity\Car;

use Illuminate\Database\Eloquent\Model;

class CarFacility extends Model {

    protected $table = 'car_facilities';

    protected $fillable = [
        'car_id',
        'feature',
        'icon'
    ];

    public function tour() {
        return $this->belongsTo('App\Entity\Car\Car', 'id', 'car_id');
    }

}
