<?php

namespace App\Models;

use App\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAggregator extends Model
{
    use HasFactory;
    protected $table = 'client_aggregator';
    protected $fillable = ['aggrerated_by','client','status'];

    /**
     * Get all of the aggregators for the ClientAggregator
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function myAggregators()
    {
        return $this->belongsTo(Client::class, 'aggrerated_by', 'id');
    }

    /**
     * Get all of the aggregators for the ClientAggregator
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aggregates()
    {
        return $this->belongsTo(Client::class, 'client', 'id');
    }
}
