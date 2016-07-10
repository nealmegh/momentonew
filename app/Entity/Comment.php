<?php namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $table = 'comments';

    /**
     * Don't forget to fill this array
     */

    protected $fillable = [
        'commentable_id',
        'commentable_type',
        'review_title',
        'review_text',
        'user_id',
        'status'
    ];

    /**
     * Polymorphic relationship
     */

    public function commentable() {
        return $this->morphTo();
    }

    public function ratings() {
        return $this->hasMany('App\Entity\Rating', 'comment_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }


}
