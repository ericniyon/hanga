<?php

namespace App\Jobs;

use App\Client;
use App\Notifications\SendOtpMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class ProcessSendOtpMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $client;
    public $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Client $client, $message = null)
    {
        $this->client = $client;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->attempts() > 1)
            return;
        $this->client->notify(new SendOtpMail($this->client->otp, $this->message));
    }
}
