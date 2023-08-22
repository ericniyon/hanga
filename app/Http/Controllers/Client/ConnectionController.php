<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\Http\Controllers\Controller;
use App\Jobs\ConnectionRequestJob;
use App\Jobs\CustomMailJob;
use App\Models\Connection;
use App\Models\Message;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    //

    public function getRating(Client $client, int $page)
    {
        $value = 10 ;
        $ratings = $client->ratings()
            ->with('doneBy')
            ->skip($page * $value)->limit($value)->get();
        return view('frontend._client_ratings', compact('client', 'ratings'));
    }

    public function makeRating(Request $request, Client $client): RedirectResponse
    {
        $client->rate($request->input('rating'), $request->input('comment'));

        return back()->with("success", "Successfully added rating information !");
    }


    /**
     * function to store connection request
     * @param Request $request
     * @param Client $client
     * @return array|RedirectResponse
     */
    public function store(Request $request, Client $client)
    {
        $user = auth()->guard("client")->user();

        if($user->application()->where('status', 'Draft')->first())
        {
            return back()->with("error", "You have a pending application. Please complete it first.");
        }

        $existConnection = Connection::where([
            ["requester_id", "=", $user->id],
            ["friend_id", "=", $client->id],
        ])->where("status", '<>', Connection::REJECTED)->first();
        if ($user->id == $client->id) {
            return redirect()->back()->with("error", "You can not connect to yourself");
        }
        if ($existConnection) {
            return redirect()->back()->with("error", "Connection exists");
        }
        else {
            try {
                $connection = new Connection();
                $connection->requester_id = $user->id;
                $connection->friend_id = $client->id;
                $connection->request_comment = $request->message ?? "$user->name would like to connect";
                $connection->is_default = $request->message == null;
                $connection->save();
                info($request);
                $connection->services()->attach($request->services);
                $this->dispatch(new ConnectionRequestJob($connection->requester, $connection->friend));
                if ($request->ajax()) {
                    return ["message" => "Connection Request Sent!!", "status" => 1];
                }
                return redirect()->back()->with("success", "Connection Request Sent!!");
            }
            catch (\Exception $exception) {
                info($exception);
                if ($request->ajax()) {
                    return ["message" => "Error occurred", "status" => 0];
                }
                return redirect()->back()->with("error", "Error occurred");
            }
        }

    }

    /**
     * function to accept,ignore or cancel connection request
     * @param Connection $connection
     * @param string $choice
     * @param Request $request
     */
    public function reviewConnectionRequest(Request $request, Connection $connection, string $choice): RedirectResponse
    {
        $choice = decryptId($choice);
        if ($choice == 1) {
            $connection->update(["status" => Connection::ACCEPTED]);
            if (!$connection->is_default) {
                Message::create([
                    "message" => $connection->request_comment,
                    "from" => $connection->requester_id,
                    "to" => $connection->friend_id,
                    "status" => Message::SEEN
                ]);
            }
            $friendName = $connection->friend->name;
            $message = "$friendName has accepted your connection request";
            $subject = "Connection Request Accepted";
            $email = $connection->requester->email;
            $this->dispatch(new CustomMailJob($message, $email, $subject));
            return redirect()->back()->with("success", "Connection Request is accepted!!");
        }
        elseif ($choice == 2) {
            $connection->update(["status" => Connection::REJECTED]);
            return redirect()->back()->with("success", "Connection Request is cancelled!!");
        }
        else {
            $connection->update(["status" => Connection::REJECTED]);
            return redirect()->back()->with("success", "Connection Request is rejected!!");
        }
    }
}
