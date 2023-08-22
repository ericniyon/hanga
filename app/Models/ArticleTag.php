<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    public $fillable = ['articleId', 'sectorId'];
    use HasFactory;
    
     public function article(){
        return $this->hasMany('App\Models\Article','articleId');
    }
}
