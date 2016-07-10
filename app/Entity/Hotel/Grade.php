<?php namespace App\Entity\Hotel;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model {

    protected $table = "hotel_grade";

    protected $fillable = [
        'name'
    ];

    public function hotels()
    {
        return $this->hasMany('App\Entity\Hotel\Grade');
    }

}
