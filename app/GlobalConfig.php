<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalConfig extends Model {

	protected $fillable = [
        'site_title',
        'site_name',
        'admin_email',
        'phone_no',
        'tax',
        'service_charge',
        'address',
        'currency',
        'about',
        'facebook',
        'googleplus',
        'logo',
        'favicon',
        'meta_description',
        'meta_tag'
    ];

}
