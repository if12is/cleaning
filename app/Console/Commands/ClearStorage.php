<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear the highlights and stories storage directories';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $directories = ['highlights', 'stories'];

        foreach ($directories as $directory) {
            // Delete files inside each directory
            $files = Storage::disk('public')->allFiles($directory);

            foreach ($files as $file) {
                Storage::disk('public')->delete($file);
            }

            $this->info("Cleared {$directory} storage directory.");
        }

        $this->info('Storage directories cleared successfully.');
    }
}
