<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityClient extends Model 
{

    protected $table = 'city_client';
    public $timestamps = true;
    protected $fillable = array('city_id', 'client_id');

}