<?php namespace App\Entity\Hotel;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $table = "hotel_category";

	protected $fillable = [
		'name'
	];

    public function hotel ()
    {
        return $this->belongsTo('App\Entity\Hotel\Hotel');
    }

}
