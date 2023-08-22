<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    public $fillable = ['name', 'detail', 'status'];

    public function ArticleInterest(){
        return $this->hasMany('App\Models\ArticleInterest','id','categoryId');
    }
}
