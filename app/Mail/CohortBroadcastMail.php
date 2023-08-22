<?php

namespace App\Mail;

use App\Models\Broadcast;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CohortBroadcastMail extends Mailable
{
    use Queueable, SerializesModels;
    public $broadcast;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Broadcast $broadcast)
    {
        $this->broadcast = $broadcast;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->broadcast->cohort->group_name.' : '.$this->broadcast->title)
                    ->view('affiliates.email.broadcast')->with([
                        'broadcast' => $this->broadcast,
                    ]);
    }
}
