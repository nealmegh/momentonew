<?php namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model {

    protected $fillable = [
        'discountable_type',
        'discountable_id',
        'amount'
    ];

    protected $guarded = ['_method', '_token'];

    public function discountable() {
        return $this->morphTo();
    }

}
