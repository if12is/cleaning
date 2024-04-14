<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('payment.payment_status', '1');
        $this->migrator->add('payment.subscription_value', 'price_1OvlgGJO4K6lIZ8tTYb2cezX');
        $this->migrator->add('payment.request_limit_subscribed_user', '10');
        $this->migrator->add('payment.request_limit_unsubscribed_user', '5');
        $this->migrator->add('payment.default_request_limit', '5');
        $this->migrator->add('payment.HighLighted_Limit_Number', '5');
        $this->migrator->add('payment.HighLighted_status', '1');
        $this->migrator->add('payment.Stories_status', '1');
        $this->migrator->add('payment.Instagram_Api_key', '5a0ed93267msh558409d00d55dd7p14dd91jsnae3c774bb512');
        $this->migrator->add('payment.Stripe_Api_key', 'pk_test_51OvlT5JO4K6lIZ8tTTpcixt1glh59x0YzzX0ZY2bZrBbdTn8zwXxecxm9Ognjp3QAa2sJst4KIMeAXimEyBFpAMj0019IHU03d');
        $this->migrator->add('payment.Stripe_Secret_key', 'sk_test_51OvlT5JO4K6lIZ8tfbglUe0dNURaBXC1t5k3znGH4AYfpriYUISLx1On2ION1bXz1CJEqCKgKBnD0lsfzxhudfJJ003pQfC535');
        $webhookUrl = env('APP_URL') . '/stripe/webhook';
        $this->migrator->add('payment.Stripe_webhook_endpoint_url', $webhookUrl);
        $this->migrator->add('payment.Stripe_webhook_secret', 'we_1OweswJO4K6lIZ8tMqEG6T1a');
        $this->migrator->add('payment.Stripe_mode', 'test');
    }
};
