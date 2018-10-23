<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{

    protected $table = 'contact_us';
    public $timestamps = true;
    protected $fillable = array('client_id','message_title','message_body');

}
