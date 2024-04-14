<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Subscription;
use Laravel\Cashier\SubscriptionItem;
use Stripe\Price;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = $request->user()
            ->newSubscription('default', 'price_1OvlgGJO4K6lIZ8tTYb2cezX')
            ->checkout([
                'success_url' => route('success'),
                'cancel_url' => route('cancel'),
            ]);
        return redirect($session->url, 303);
    }

    public function webhook(Request $request)
    {
        $payload = $request->all();
        // Handle the incoming event
        if ($payload['type'] == 'customer.subscription.created') {
            $session = $payload['data']['object'];
            $this->storeSubscriptionDetails($session);
        }
    }

    protected function storeSubscriptionDetails($session)
    {
        // Assuming you have a Subscription model to store subscription details
        $end_at = $session['current_period_end']; // 1713680546 convert to date time
        $end_at = date('Y-m-d H:i:s', $end_at);
        $user_id_from_customer = $session['customer'];
        $user_id = User::where('stripe_id', $user_id_from_customer)->first()->id;

        // Adjust according to your database structure
        $subscription =   Subscription::create([
            'user_id' => $user_id,
            'type' => $session['metadata']['type'], // or 'premium', 'gold', etc.
            'stripe_id' => $session['id'],
            'stripe_status' => $session['status'],
            'stripe_price' => $session['items']['data'][0]['price']['id'],
            'quantity' => $session['items']['data'][0]['quantity'],
            'trial_ends_at' => $session['trial_end'],
            'ends_at' => $end_at,
        ]);

        //subscription item
        SubscriptionItem::create([
            'subscription_id' => $subscription->id,
            'stripe_id' => $session['items']['data'][0]['id'],
            'stripe_product' => $session['items']['data'][0]['price']['product'],
            'stripe_price' => $session['items']['data'][0]['price']['id'],
            'quantity' => $session['items']['data'][0]['quantity'],
        ]);

        return response()->json(['status' => 'success'], 200);
    }


    public function success()
    {
        return view('subscription.success');
    }

    public function cancel()
    {
        return view('subscription.cancel');
    }
}
