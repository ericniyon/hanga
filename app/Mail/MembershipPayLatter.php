<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MembershipPayLatter extends Mailable
{
    use Queueable, SerializesModels;
    public $name,$plan,$subtotal,$tax, $total;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$plan,$subtotal,$tax, $total)
    {
        $this->$name = $name;
        $this->plan = $plan;
        $this->subtotal = $subtotal;
        $this->tax = $tax;
        $this->total = $total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('invoice')->view('emails.payleter');
    }
}
