<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Client extends Model
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'birth_date', 'city_id', 'phone', 'password', 'status','donation_last_date','api_token');

    public function requests()
    {
        return $this->hasMany('App\DonationRequests');
    }
    public function article()
    {
        return $this->hasMany('App\Article');
    }
    public function report()
    {
        return $this->hasMany('App\Report');
    }
    public function city_notification()
    {
      return $this->belongsToMany('App\Citiy');
    }
    public function makeFav()
    {
        return $this->belongsToMany('App\Article');
    }
    public function contactUs()
    {
        return $this->hasMany('App\ContactUs');
    }

    protected $hidden = [
        'password', 'api_token',
    ];

}
