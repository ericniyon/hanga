<?php


namespace App\Http\Controllers\Frontend;


use App\Client;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationBaseModel;
use App\Models\Connection;
use App\Models\ProfileViews;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Builder;

class MyNetworksController extends Controller
{
    public function index()
    {
        $user = auth('client')->user();
        $pendingRequests = Connection::query()
            ->with('requester.application.businessSectors')
            ->addSelect([
                'ratings_count' => Rating::query()
                    ->selectRaw("count(*)")
                    ->whereColumn('ratable_id', '=', 'connections.requester_id')
                    ->where('ratable_type', '=', Client::class)
            ])
            ->addSelect([
                'ratings_avg_rating' => Rating::query()
                    ->selectRaw('avg(ratings.rating)')
                    ->whereColumn('ratable_id', '=', 'connections.requester_id')
                    ->where('ratable_type', '=', Client::class)
            ])
            ->with('requester', function ($q) {
                $q->whereHas("application", function ($q) {
                    $q->whereNotIn("status", [ApplicationBaseModel::DRAFT]);
                });
            })
            ->whereHas('requester', function (Builder $builder) {
                $builder->whereHas("application", function ($q) {
                    $q->whereNotIn("status", [ApplicationBaseModel::DRAFT]);
                });
            })
            ->where("friend_id", $user->id)
            ->where("status", Connection::PENDING)
            ->get();

        $sentRequests = Connection::query()
            ->with(['friend.application.businessSectors','friend.registrationType'])
            ->with("friend", function ($q) {
                $q->whereHas("application", function ($q) {
                    $q->whereNotIn("status", [ApplicationBaseModel::DRAFT]);
                });
            })
            ->whereHas('friend', function (Builder $builder) {
                $builder->whereHas("application", function ($q) {
                    $q->whereNotIn("status", [ApplicationBaseModel::DRAFT]);
                });
            })
            ->where("requester_id", $user->id)
            ->where("status", Connection::PENDING)
            ->get();
        return view('frontend.my_networks', [
            'pendingRequests' => $pendingRequests,
            'sentRequests' => $sentRequests
        ]);
    }

    public function profileViewer()
    {
        $myId = auth("client")->id();
        $viewers = ProfileViews::query()->where("profile_id", $myId)
            ->where("visitor_id", "<>", $myId)->get();
        return view("client.profile_viewer", compact('viewers'));
    }
}
