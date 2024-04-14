<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{

    public string $name;

    public string $email;

    public string $logo;

    public string $favicon;

    public string $description;

    public string $keywords;

    public static function group(): string
    {
        return 'general';
    }
}
