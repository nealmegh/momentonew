<?php namespace App\Entity\Tour;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model {

	protected $table = 'tours';

    protected $fillable = [
        'name',
        'title',
        'description',
        'short_description',
        'location',
        'city',
        'country',
        'tour_date',
        'date_from',
        'date_to',
        'price_per_adult',
        'price_per_child',
        'google_map',
        'total_days',
        'itinerary'
    ];

    public function images()
    {
        return $this->morphMany('App\Images', 'imageable');
    }

    public function discount()
    {
        return $this->morphOne('App\Entity\Discount', 'discountable');
    }

    public function features() {
        return $this->hasMany('App\Entity\Tour\TourFeature', 'tour_id', 'id');
    }

    public function comments()
    {
        return $this->morphMany('App\Entity\Comment', 'commentable' );
    }

    public function rating_types()
    {
        return $this->morphMany('App\Entity\RatingType', 'rateable' );
    }

    public function ratings()
    {
        return $this->morphMany('App\Entity\Rating', 'rateable');
    }

}
