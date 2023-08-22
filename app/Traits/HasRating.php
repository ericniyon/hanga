<?php

namespace App\Traits;

use App\Models\ApplicationSolution;
use Illuminate\Database\Eloquent\Builder;

trait HasRating
{
    public function rate($ratingValue, $comment, $doneBy = null)
    {
        $doneBy = $doneBy ?: auth()->guard("client")->id();

        $rating = $this->ratings()
            ->where("done_by_id", "=", $doneBy)
            ->first();

        if ($rating) {

            $rating->update([
                "rating" => $ratingValue,
                "comment" => $comment,
                "done_by_id" => $doneBy,
            ]);

        }
        else {
            $this->ratings()
                ->create([
                    "done_by_id" => $doneBy,
                    "comment" => $comment,
                    "rating" => $ratingValue
                ]);
        }

    }

    public function ratingAverage(): float
    {
        $total = $this->ratings_count;
        $total = $total == 0 ? 1 : $total;

        return round($this->ratings_sum_rating / $total, 2);
    }

    public function scopeOrderRating(Builder $builder, $ratableId = 'clients.id'): Builder
    {
        $type = $this->getMorphClass();
        info($type);
        return $builder->orderByRaw("(select coalesce(sum(r.rating)/count(r.rating) + 1, 1) from ratings r where r.ratable_id=$ratableId and r.ratable_type='$type' ) desc");
    }
}
