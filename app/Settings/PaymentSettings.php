<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class PaymentSettings extends Settings
{
    public string $payment_status;

    public string $subscription_value;

    public string $request_limit_subscribed_user;

    public string $request_limit_unsubscribed_user;

    public string $default_request_limit;

    public string $HighLighted_Limit_Number;

    public string $HighLighted_status;

    public string $Stories_status;

    public string $Instagram_Api_key;

    public string $Stripe_Api_key;

    public string $Stripe_Secret_key;

    public string $Stripe_webhook_endpoint_url;

    public string $Stripe_webhook_secret;

    public string $Stripe_mode;

    public static function group(): string
    {
        return 'payment';
    }
}
