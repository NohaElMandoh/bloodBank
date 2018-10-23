<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationRequests extends Model
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('client_id', 'city_id','patient_name','patient_age' ,'bags_num','hospital_name', 'hospital_add' ,'phone_num' ,'notes', 'latitude','longitude' );

/*    public function notification()
    {
        return $this->belongsToMany('Notification');
    }*/
    public function city()
  {
      return $this->belongsTo(City::class);
  }

  public function client()
  {
      return $this->belongsTo(Client::class);
  }


}
