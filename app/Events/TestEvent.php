<?php

namespace App\Events;

use App\Client;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public array $data;
    public function __construct(array $data)
    {
        //
        $this->data= $data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
//    public function broadcastOn()
//    {
//        return new Channel('messages');
//    }
    public function broadcastOn()
    {
        return new Channel('messages');
    }
    public function broadcastAs(): string
    {
        return "Sendmessage";
    }
    public function broadcastWith(): array
    {
        return $this->data;
    }
}
