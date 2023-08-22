<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    use HasFactory;

    public function client(){
        return $this->belongsTo('App\Models\client','clientId');
    }

    public function article(){
        return $this->belongsTo('App\Models\Article','articleId');
    }
}
