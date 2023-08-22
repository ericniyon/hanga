<?php

namespace App\Http\Controllers\Membership;

use App\Http\Controllers\Controller;
use App\Models\MembershipPackege;
use Illuminate\Http\Request;

use App\Models\Connection;
use App\Models\Application;
use App\Client;

class Packege extends Controller
{
function details($id)
{


        $user = auth('client')->user();
        $application = Application::with('client.registrationType')
            ->where('client_id', '=', auth('client')->id())
            ->first();

        if (is_null($application)) {
            return redirect()->to(route('v2.join.as'));
        }
        $suggested = Client::with(['registrationType', 'application.businessSectors'])
            ->withCount('ratings')
            ->withSum('ratings', 'rating')
            ->withoutMe()
            ->whereHas('registrationType')
            ->notConnectedWithMe()
            ->mySuggestions()
            ->limit(10)
            ->get();
        $pendingRequest = Connection::query()
            ->where("friend_id", $user->id)
            ->where("status", Connection::PENDING)
            ->get();
    $packege = MembershipPackege::find($id);

    return view('partials/__memberships_details', [
            'packege' => $packege,
            'application' => $application,
            'suggested' => $suggested,
            'pendingRequest' => $pendingRequest,
        ]);
}
}
