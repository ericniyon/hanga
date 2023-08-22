<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;




    public function Client(){
        return $this->belongsTo('App\Models\Client','clientId');
    }

    public function articleInterest(){
        return $this->hasMany('App\Models\ArticleInterest','articleId');
    }

    public function ArticleLikes(){
        return $this->hasMany('App\Models\ArticleLike','articleId');
    }

    public function ArticleToread(){
        return $this->hasMany('App\Models\ArticleToread','articleId');
    }

    public function ArticleViews(){
        return $this->hasMany('App\Models\ArticleView','articleId');
    }


      public function articleComments(){
        return $this->hasMany('App\Models\ArticleComment','articleId');
    }


}
