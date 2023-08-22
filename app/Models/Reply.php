<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'message', 'complaint', 'replyer'
    ];


    public function client()
    {
        return $this->belongsTo(Client::class, 'id', 'addressed_to');
    }
    public function repliedClient()
    {
        return $this->hasMany(Client::class, 'id', 'replyer');
    }


}
