<?php

namespace App\Console\Commands;

use App\Models\SessionRequest;
use Carbon\Carbon;
use GeoIp2\Exception\GeoIp2Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ResetRequestCounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'request:reset-counts';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset request counts at midnight according to each user\'s timezone.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sessionRequests = SessionRequest::all();

        foreach ($sessionRequests as $sessionRequest) {
            // Assuming 'user_ip' is available and you have a method to determine the timezone from an IP
            $timezone = $this->determineTimezone($sessionRequest->user_ip);
            $userTimezone = new \DateTimeZone($timezone);
            $nowInUserTimezone = Carbon::now($userTimezone);

            if ($nowInUserTimezone->format('H') == '00') { // Check if it's midnight in user's timezone
                $sessionRequest->request_count = 0;
                $sessionRequest->status = 'active';
                $sessionRequest->save();
            }

            //info log
            $this->info('Request counts for user ' . $sessionRequest->user_id . ' have been reset.');

            //log the reset
            Log::info('Request counts for user ' . $sessionRequest->user_id . ' have been reset.');
        }

        $this->info('Request counts have been reset.');

        //log the reset
        Log::info('Request counts have been reset.');
    }


    protected function determineTimezone($ip)
    {
        // Default to a safe value in case GeoIP2 fails
        $defaultTimezone = 'UTC';
        $geoipDatabasePath = storage_path('app/geoip/GeoLite2-City.mmdb'); // Adjust the path as necessary

        try {
            $reader = new \GeoIp2\Database\Reader($geoipDatabasePath);
            $record = $reader->city($ip);
            return $record->location->timeZone ?? $defaultTimezone;
        } catch (GeoIp2Exception $e) {
            // Log error or handle exception
            return $defaultTimezone;
        }
    }
}
