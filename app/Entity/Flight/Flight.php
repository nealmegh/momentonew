<?php namespace App\Entity\Flight;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model {

    protected $table = 'flights';

    protected $fillable = [
        'name',
        'title',
        'company_name',
        'description',
        'short_description',
        'from',
        'to',
        'flight_type',
        'fare_type',
        'duration',
        'cancellation',
        'flight_change',
        'baggage',
        'flight_features',
        'featured',
        'base_fare',
        'tax',
        'direction',
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
        return $this->hasMany('App\Entity\Flight\FlightFacility', 'flight_id');
    }

    public function schedule() {
        return $this->hasMany('App\Entity\Flight\FlightSchedule', 'flight_id');
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

        static::deleting(function($flight) { // before delete() method call this
            $flight->facilities()->delete();
            $flight->images()->delete();
            $flight->comments()->delete();
            $flight->ratings()->delete();

            // do the rest of the cleanup...
        });
    }

}
