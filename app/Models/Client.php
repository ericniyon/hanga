<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\registrationType;
use App\Models\Application;
use Illuminate\Foundation\Auth\User as Authenticatable;

// , 'id', 'registration_type_id'

class Client extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'name_slug',
        'otp',
        'auth_type_id',
        'auth_type',
        'expires_at',
        'password',
        'verified_at'
    ];

    protected $hidden = [
        'password',
        'verified_at',
        'is_active'
    ];

    public function Article()
    {
        return $this->hasMany('App\Models\Article', 'id', 'clientId');
    }

    public function registrationType()
    {
        return $this->belongsTo('App\Models\RegistrationType');
    }

    /**
     * Get the application that owns the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function application()
    {
        return $this->hasMany(Application::class);
    }
}
