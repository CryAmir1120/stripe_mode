<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

class WebHookController extends Controller
{
    public function handleWebHook(Request $request)
    {

        Log::info('-----Starting captured----');
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
