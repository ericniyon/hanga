<?php

namespace App\Jobs;

use App\Client;
use App\Mail\ConnectionRequest;
use App\Mail\RegisterUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ConnectionRequestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected Client $requester;
    protected Client $friend;
    public function __construct(Client $requester,Client $friend)
    {
        //
        $this->requester=$requester;
        $this->friend=$friend;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        if ($this->attempts() < 5) {
            $this->sendEmail();
        }
    }

    public function sendEmail()
    {
        $data = array(
            'friend' => $this->friend->name,
            'profile_image' => $this->requester->profile_photo_url,
            'requester_name'=>$this->requester->name,
            'requester_type'=>$this->requester->registrationType->name,
            'requester_bio'=>$this->requester->application->bio,
            'accept_url'=>route("client.review.connection.request",["connection"=>encryptId($this->requester->id),"choice"=>encryptId(1)]),
            'profile_url'=>$this->requester->application->detailsUrl());
        Mail::to($this->friend->email)->send(new ConnectionRequest($data));

    }
}
