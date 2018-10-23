<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citiy extends Model
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('governorate_id');

    public function city_client()
    {
        return $this->hasMany('Client');
    }

    public function city_donation()
    {
        return $this->hasMany('DonationRequests');
    }
    public function governorate()
  {
      return $this->belongsTo(Governorate::class);
  }

}
