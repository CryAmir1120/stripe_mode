<?php

namespace App\Listeners;

use App\Events\WebHookEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class OneTimePaySuccessListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(WebHookEvent $event)
    {
        $payload = $event->payload;
        Log::info('-----captured----');
    }
}
