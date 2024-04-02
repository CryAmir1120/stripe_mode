<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class WebHookController extends Controller
{
    public function onetimeHook(Request $request)
    {
        try {
            Log::info('-----captured----');
            $payload = json_decode($request->getContent(), true);
            WebhookReceived::dispatch($payload);
            return response('Webhook sucess', 200);
        } catch (Exception $e) {
            Log::error('webhook error: '. $e->getMessage());
            return response('Webhook Error', 400);
        }
    }
}
