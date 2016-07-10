<?php namespace App\Entity\Tour;

use Illuminate\Database\Eloquent\Model;

class TourFeature extends Model {

    protected $table = 'tour_features';

    protected $fillable = [
        'tour_id',
        'feature',
        'package'
    ];

    public function tour() {
        return $this->belongsTo('App\Entity\Tour\Tour', 'id', 'tour_id');
    }

}
