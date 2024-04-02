<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function charge()
    {
        $intent = Auth::user()->createSetupIntent();
        $product = 'price_1P0xcBRqgiXUgoWt8HXmklKb';
        $price = 20000;
        $user = auth()->user();
        return view('stripe.charge', compact('intent', 'product', 'price', 'user'));
    }
    public function chargePost(Request $request, String $product, String $price)
    {
        $user = $request->user();
        $payment_method = $request->input('payment_method');
        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($payment_method);
            $user->charge($price,$payment_method);
            return back()->with('message', 'Product purchased successfully!');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
            dd($e->getMessage());
        }
    }
}
