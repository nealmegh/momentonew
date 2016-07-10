<?php namespace App;

use Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

    use EntrustUserTrait; // add this trait to your user model


    /**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 * @var array
	 */
	protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'country_code', //new add
        'phone_no',
        'birth_date',
        'address',
        'city',
        'zip',
        'country',
        'about'
    ];

    protected $birth_date = ['published_at'];


	/**
	 * The attributes excluded from the model's JSON form.
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    protected function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function userType()
    {
        return $this->hasOne('App\UserType', 'id', 'user_type');
    }

    public function hotelManager()
    {
        return $this->hasOne('App\Entity\Hotel\Manager');
    }

    public function hotelBooking()
    {
        return $this->hasMany('App\Entity\Hotel\HotelBooking', 'user_id');
    }

    public function booking()
    {
        return $this->hasMany('App\Entity\Booking', 'user_id', 'id');
    }

    public function profilePicture()
    {
        return $this->morphOne('App\Images', 'imageable');
    }

    public function articles()
    {
        return $this->hasMany('App\Entity\Article');
    }

    public function comments()
    {
        return $this->hasMany('App\Entity\Comment', 'user_id'  );
    }

    public function ratings()
    {
        return $this->hasMany('App\Entity\Rating', 'rateable' );
    }

//    public function agentHotels() {
//        return $this->hasManyThrough('App\Entity\Hotel\Hotel', 'App\Entity\Agent\Agent', 'user_id', 'id');
//    }
    public function agentMarkup()
    {
        return $this->hasOne('App\Entity\Agent\AgentsMarkup', 'agent_id');
    }

    public function agentHotels()
    {
        return $this->hasMany( 'App\Entity\Agent\Agent', 'user_id');
    }

    public function agentBooking()
    {
        return $this->hasMany('App\Entity\Booking', 'agent_id', 'id');
    }

  
}
