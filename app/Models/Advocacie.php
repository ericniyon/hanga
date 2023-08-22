<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advocacie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'category',
        'complaint',
        'status',
        'addressed_to',
        'sender',
        'document',
    ];

    /**
     * Get all of the comments for the Advocacie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function client()
    {
        return $this->hasMany(Client::class, 'id', 'addressed_to');
    }

    /**
     * Get all of the comments for the Advocacie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->belongsTo(Reply::class, 'id', 'complaint');
    }

}
