<?php

namespace App\Listeners;

use App\Events\WebHookEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

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
    public function handle(WebhookReceived $event)
    {
        $payload = $event->payload;
        Log::info('-----captured---- Listener'. json_encode($payload));
    }
}
