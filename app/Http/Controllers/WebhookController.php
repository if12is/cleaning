<?php

namespace Laravel\Cashier\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Subscription;
use Laravel\Cashier\SubscriptionItem;

class WebhookController extends Controller
{
    public function Webhook(Request $request)
    {
        $payload = $request->getContent();
        $event = json_decode($payload);

        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object; // This is the session object
            dd($session);
            $this->storeSubscriptionDetails($session);
        }

        return response()->json(['status' => 'success']);
    }


    protected function storeSubscriptionDetails($session)
    {
        // Assuming you have a Subscription model to store subscription details
        $stripe_price = 'price_1OvlgGJO4K6lIZ8tTYb2cezX';
        $stripe_product = 'prod_PlIGOJZtSwb5qz';
        $end_at = now()->addMonth();
        // Adjust according to your database structure
        $subscription =   Subscription::create([
            'user_id' => Auth::id(),
            'type' => 'default', // or 'premium', 'gold', etc.
            'stripe_id' => $session->customer,
            'stripe_status' => 'incomplete',
            'stripe_price' => $stripe_price,
            'quantity' => 1,
            'trial_ends_at' => null,
            'ends_at' => $end_at,
        ]);

        //subscription item
        SubscriptionItem::create([
            'subscription_id' => $subscription->id,
            'stripe_id' => $session->customer,
            'stripe_product' => $stripe_product,
            'stripe_price' => $stripe_price,
            'quantity' => 1,
        ]);
    }
}
