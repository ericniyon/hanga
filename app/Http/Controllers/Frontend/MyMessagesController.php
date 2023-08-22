<?php


namespace App\Http\Controllers\Frontend;


use App\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yaf\Response\Cli;

class MyMessagesController extends \App\Http\Controllers\Controller
{

    public function index(Request $request)
    {

        $user = auth()->guard("client")->user();
        $connections = Client::query()
            ->connectedWithMe()
//            ->withCount(['messages as latest_message' => function($query) {
//                $query->select(DB::raw('max(created_at)'));
//            }])
//            ->orderByDesc('latest_message')
            ->limit(20)->get();
        $token = csrf_token();
        $client = decryptId($request->input("client"));
        return view('frontend.my_messages',compact('connections','user','token','client'));
    }


    public function loadMore(int $page){
        $user = auth()->guard("client")->user();
        $connections = $user->where(function (Builder $builder) use ($user) {
            $user->scopeConnectedWithMe($builder);
        })->skip($page*20)->limit(20)->get();

        foreach ($connections as $item){
            $item->messages;
        }

        return $connections;
    }

}
