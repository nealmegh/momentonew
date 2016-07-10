<?php namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class RatingType extends Model {

    protected $fillable = [
        'name',
        'service'
    ];

    public function ratings () {
        return $this->hasMany('App\Entity\Rating', 'rating_type');
    }
}
