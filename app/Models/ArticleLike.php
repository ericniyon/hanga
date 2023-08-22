<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleLike extends Model
{
    use HasFactory;

     public function ArticleLike(){
        return $this->belongsTo('App\Models\Article','id','articleId');
    }


    
    public function Client(){
        return $this->belongsTo('App\Models\client','id','clientId');
    }

}
