<?php namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {

	protected $fillable = [
        'comment_id',
        'rating_type',
        'rating_value',

    ];


    public function rating_type()
    {
       return $this->belongsTo('App\Entity\RatingType', 'id', 'rating_type');
    }

    public function comments()
    {
        return $this->belongsTo('App\Entity\Comment', 'id', 'comment_id');
    }

    public function rateable()
    {
        return $this->morphTo();
    }

}
