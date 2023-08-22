<?php

namespace App\Mail\advocacy;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendToProducer extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $complaint_category;
    public function __construct($complaint)
    {
        $this->complaint_category = $complaint;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $category = $this->complaint_category;
        return $this->view('emails.advocacy.complaint', compact('category'));
    }
}
