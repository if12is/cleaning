<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('page.privacy_policy', '');
        $this->migrator->add('page.terms_and_conditions', '');
        $this->migrator->add('page.contact_us', '');
        $this->migrator->add('page.about_us', '');
    }
};
