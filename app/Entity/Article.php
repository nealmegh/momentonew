<?php namespace App\Entity;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id', //Temporary
        'category_id',
        'excerpt',
        'status'
    ];

    protected $dates = ['published_at'];

    /**
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('status', '=', 1)->orderBy('id', 'desc');
    }

    public function setPublishedAtAttribute($date)
    {
    $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function user()
    {
       return $this->belongsTo('App\User');
    }

    public function images()
    {
        return $this->morphOne('App\Images', 'imageable');
    }
}
