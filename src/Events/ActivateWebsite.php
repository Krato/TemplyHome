<?php

namespace Infinety\TemplyHome\Http\Events;

use Illuminate\Queue\SerializesModels;

class ActivateWebsite
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
