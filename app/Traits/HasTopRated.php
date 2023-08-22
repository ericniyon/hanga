<?php

namespace App\Traits;

use App\Client;
use App\Models\RegistrationType;
use Illuminate\Database\Eloquent\Builder;

trait HasTopRated
{

    /**
     * @return mixed
     */
    public function getHighRatedDsp()
    {
        return Client::with(['registrationType', 'application'])
            ->withCount('ratings')
            ->withAvg('ratings', 'rating')
            ->withoutMe()
            ->whereHas('application')
            ->whereHas("ratings")
            ->whereHas('registrationType', function (Builder $builder) {
                $builder->where('name', '=', RegistrationType::DSP);
            })
            ->orderRating()
            ->limit(4)
            ->get();
    }

    /**
     * @return mixed
     */
    public function getHighRatedIworkers()
    {
        return Client::with(['registrationType', 'application'])
            ->withCount('ratings')
            ->withAvg('ratings', 'rating')
            ->withoutMe()
            ->whereHas('application')
            ->whereHas('registrationType', function (Builder $builder) {
                $builder->where('name', '=', RegistrationType::iWorker);
            })
            ->whereHas("ratings")
            ->orderRating()
            ->limit(4)
            ->get();
    }

    /**
     * @return mixed
     */
    public function getHighRatedMsmes()
    {
        return Client::with(['registrationType', 'application'])
            ->withCount('ratings')
            ->withAvg('ratings', 'rating')
            ->withoutMe()->whereHas('application')
            ->whereHas("ratings")
            ->whereHas('registrationType', function (Builder $builder) {
                $builder->where('name', '=', RegistrationType::MSME);
            })->orderRating()
            ->limit(4)
            ->get();
    }
}
