<?php

namespace App\Http\Controllers;
use App\Client;
use App\Events\TestEvent;
use App\Http\Controllers\Controller;
use App\Models\BlockMember;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function auth;

class ChatController extends Controller {
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function loadMore($client,int $page){
        return Client::find($client)->messages()->skip($page * 10)->limit(10)->get();
    }

    public function sendMessage(Request $request): JsonResponse
    {
        $user = auth('client')->user();



        $obj = Message::create([
            "message"=>$request->input("message"),
            "from"=>$user->id,
            "to"=>intval($request->input("to")),
            "created_at"=>now()
        ]);

        $message = [
            "user"=>[
                "id"=>$user->id,
                "name"=>$user->name,
                "profileUrl"=>route('client.details',['slug'=>$user->name_slug]) ,
                "profile"=>$user->profile_photo_url,
                "type"=>$user->registrationType->name??'',
                "default"=>$user->defaultPhotoUrl
            ],
            "message"=>$request->input("message"),
            "date"=>now(),
            "from"=>$user->id,
            "id"=>$obj->id,
            "fromEncrypted"=>encryptId($user->id),
            "to"=>intval($request->input("to"))
        ];

        event(new TestEvent($message));
        return response()->json([
            "body"=>$message,
            "id"=>$obj->id,
            "token"=>csrf_token()
        ]);
    }


    public function markReceived(Message $message): JsonResponse
    {


        $user = auth('client')->user();

        $map = [
            "from"=>$user->id,
            "to"=>$message->from,
            "id"=>$message->id,
            "delivered"=>true
        ];

        event(new TestEvent($map));
        $message->update([
            "status"=>"Read"
        ]);

        return response()->json($message);
    }

    public function markMultipleMessage(Request $request): JsonResponse
    {
        $messages = $request->input("messages");

        if($messages && is_array($messages)) {
            foreach ($messages as $item) {
                Message::find($item)->update([
                    "status" => "Read"
                ]);
            }
        }

        return response()->json(["token"=>csrf_token()]);
    }

    public function toggleSound(int $sound): JsonResponse
    {
        $user = auth('client')->user();
        $user->update([
            "allow_notification_sound" => $sound == 1
        ]);

        return response()->json();
    }

    public function blockUser(int $client,int $status): JsonResponse
    {
        $user = auth('client')->id();

        $obj = BlockMember::query()->where("blocker_id","=",$user)
            ->where("blocked_id","=",$client)->first();


        if( $status == 1){
            if(!$obj){
                BlockMember::create([
                    "blocker_id"=>$user,
                    "blocked_id"=>$client
                ]);
            }
        }else{
            BlockMember::query()->where("blocker_id","=",$user)
                ->where("blocked_id","=",$client)->delete();
        }
        $map = [
            "from"=>$user,
            "to"=>$client,
            "block_status"=>$status == 1
        ];

        event(new TestEvent($map));

        return response()->json();
    }
}

