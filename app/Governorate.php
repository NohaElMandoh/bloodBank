<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('name');

    public function has_city()
    {
        return $this->hasMany('Citiy');
    }

}
