<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleInterest extends Model
{
    use HasFactory;


    public $fillable = ['articleId', 'clientId', 'categoryId'];
    public function Category(){
        return $this->belongsTo('App\Models\ArticleCategory','categoryId');
    }

     public function Client(){
        return $this->belongsTo('App\Models\client','clientId');
    }


     public function article(){
        return $this->hasMany('App\Models\Article','articleId');
    }
}
