<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model {

    protected $table = 'images';

    // Don't forget to fill this array
    protected $fillable = [
        'path',
        'name',
        'type',
        'imageable_id',
        'imageable_type'
    ];

    /**
     * Polymorphic relationship
     */
    public function imageable() {
        return $this->morphTo();
    }

}
