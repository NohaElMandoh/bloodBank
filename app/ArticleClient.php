<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleClient extends Model
{

    protected $table = 'article_client';
    public $timestamps = true;
    protected $fillable = array('client_id','article_id');

}
