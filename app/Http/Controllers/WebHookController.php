<?php

namespace App\Http\Controllers;

use App\Events\WebHookEvent;
use Illuminate\Http\Request;
use Laravel\Cashier\Events\WebhookReceived;

class WebHookController extends Controller
{
    public function onetimeHook(Request $request)
    {
        $payload = json_decode($request->getContent(), true);
        WebhookReceived::dispatch($payload);
    }
}
