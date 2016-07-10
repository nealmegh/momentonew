<?php namespace App\Entity\Car;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {

    protected $table = 'cars';

    protected $fillable = [
        'name',
        'title',
        'description',
        'short_description',
        'type',
        'hourly_price',
        'whole_day_price',
        'company_name',
        'passenger',
        'baggage',
        'car_features',
        'featured',
        'pick_up_time',
        'drop_off_time',
        'pick_up_location',
        'drop_off_location',
        'millage'
    ];

    public function images()
    {
        return $this->morphMany('App\Images', 'imageable');
    }

    public function discount()
    {
        return $this->morphOne('App\Entity\Discount', 'discountable');
    }

    public function facilities() {
        return $this->hasMany('App\Entity\Car\CarFacility', 'car_id', 'id');
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

    protected static function boot() {
        parent::boot();

        static::deleting(function($car) { // before delete() method call this
            $car->facilities()->delete();
            $car->images()->delete();
            $car->comments()->delete();
            $car->ratings()->delete();

            // do the rest of the cleanup...
        });
    }

}
