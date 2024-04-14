<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.name', 'Insta');
        $this->migrator->add('general.email', 'insta@admin.com');
        $this->migrator->add('general.logo', 'logo.png');
        $this->migrator->add('general.favicon', 'favicon.png');
        $this->migrator->add('general.description', 'Insta is a social media platform');
        $this->migrator->add('general.keywords', 'social media, platform, instagram');
    }
};
