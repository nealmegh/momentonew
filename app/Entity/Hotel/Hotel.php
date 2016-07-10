<?php namespace App\Entity\Hotel;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model {

	protected $table = "hotel";

    protected $fillable = array(
        'name',
        'title',
        'category_id',
        'grade_id',
        'address',
        'country',
        'state',
        'city',
        'zip',
        'email',
        'fax',
        'phone',
        'cell',
        'distance_from_airport',
        'distance_from_market',
        'pet_allowed',
        'google_map',
        'general_information',
        'service_information',
        'other_information',
        'policy',
        'terms',
        'cancellation',
        'facilities',
    );

    public function manager() {
        return $this->hasOne('App\Entity\Hotel\Manager', 'hotel_id');
    }

    public function facilities() {
        return $this->hasMany('App\Entity\Hotel\Facility', 'hotel_id');
    }

    public function category() {
        return $this->hasOne('App\Entity\Hotel\Category', 'id', 'category_id');
    }

    public function rooms() {
        return $this->hasMany('App\Entity\Hotel\Room\Room', 'hotel_id');
    }

    public function roomTypes() {
        return $this->hasMany('App\Entity\Hotel\Room\RoomType', 'hotel_id');
    }

    public function grade() {
        return $this->belongsTo('App\Entity\Hotel\Grade');
    }

    public function booking() {
        return $this->hasMany('App\Entity\Hotel\HotelBooking', 'hotel_id');
    }

    public function bookings()
    {
        return $this->hasManyThrough('App\Entity\Booking', 'App\Entity\Hotel\HotelBooking', 'hotel_id', 'id');
    }

    public function images()
    {
        return $this->morphMany('App\Images', 'imageable');
    }

    public function discount()
    {
        return $this->morphOne('App\Entity\Discount', 'discountable');
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

//    public function agent()
//    {
//        return $this->hasManyThrough('App\User', 'App\Entity\Agent\Agent', 'id', 'id');
//    }

    public function agent()
    {
        return $this->hasOne('App\Entity\Agent\Agent', 'hotel_id', 'id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($hotel) { // before delete() method call this
            $hotel->facilities()->delete();
            $hotel->rooms()->delete();
            $hotel->roomTypes()->delete();
            $hotel->booking()->delete();
            $hotel->images()->delete();
            $hotel->comments()->delete();
            $hotel->ratings()->delete();
            $hotel->agent()->delete();

            // do the rest of the cleanup...
        });
    }
}
