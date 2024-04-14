<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class PagesSettings extends Settings
{
    //privacy policy
    public string $privacy_policy;

    //terms and conditions
    public string $terms_and_conditions;

    //Contact Us
    public string $contact_us;

    //About Us
    public string $about_us;

    public static function group(): string
    {
        return 'page';
    }
}
