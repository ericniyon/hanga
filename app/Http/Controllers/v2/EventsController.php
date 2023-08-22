<?php

namespace App\Http\Controllers\v2;

use App\Models\Webinar;

class EventsController extends \App\Http\Controllers\Controller
{
    public function details($id)
    {
        $event = Webinar::query()
            ->findOrFail(decryptId($id));

        return view('client.v2.event_details', [
            'event' => $event
        ]);
    }
}
