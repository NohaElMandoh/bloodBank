<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $table = 'articles';
    public $timestamps = true;
    protected $fillable = array('client_id', 'category_id');

    public function article_type()
    {
        return $this->belongsTo('Category');
    }

    public function hasFav()
    {
        return $this->hasMany('ArticleClient');
    }



}
