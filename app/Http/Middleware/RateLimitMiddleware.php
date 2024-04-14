<?php

namespace App\Http\Middleware;

use App\Models\SessionRequest;
use Carbon\Carbon;
use Closure;
use GeoIp2\Exception\GeoIp2Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RateLimitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $session_id = session()->getId();
        $fingerprint = $request->header('X-Client-Fingerprint');
        $user_ip = $this->getIp(); // Capture user IP for timezone calculation
        // $user_ip = '197.63.240.235'; // Capture user IP for timezone calculation
        $timezone = $this->determineTimezone($user_ip);
        $userId = $user ? $user->id : null;
        // dd($user, $session_id, $user_ip, $timezone, $userId, $fingerprint);
        // Search for an existing record based on session_id, user_id, or user_ip
        $existingSessionRequest = SessionRequest::where(function ($query) use ($session_id, $userId, $user_ip) {
            $query->where('session_id', $session_id)
                ->orWhere(function ($query) use ($userId) {
                    if (!is_null($userId)) {
                        $query->where('user_id', $userId);
                    }
                })
                ->orWhere('user_ip', $user_ip);
        })->first();

        // Update the existing record or create a new one
        $sessionRequest = SessionRequest::updateOrCreate(
            [
                'id' => $existingSessionRequest ? $existingSessionRequest->id : null
            ],
            [
                'session_id' => $session_id,
                'last_request_date' => Carbon::today(),
                'user_ip' => $user_ip,
                'user_id' => $userId,
                'request_count' => $existingSessionRequest ? $existingSessionRequest->request_count : 0
            ]
        );
        // Define limits based on user types
        $limits = [
            'default' => payment_settings('default_request_limit'),
            'unsubscribed' => payment_settings('request_limit_unsubscribed_user'),
            'subscribed' => payment_settings('request_limit_subscribed_user'),
        ];

        $limit = $limits['default']; // Default limit

        if ($user) {
            $limit = $user->subscribed() ? $limits['subscribed'] : $limits['unsubscribed'];
        }
        // dd($limit, $user_ip, $sessionRequest);
        // Adjust for timezone and reset if it's a new day
        $userTimezone = new \DateTimeZone($this->determineTimezone($user_ip)); // Implement this method
        $today = Carbon::now($userTimezone)->startOfDay();
        $lastRequestDate = Carbon::createFromFormat('Y-m-d', $sessionRequest->last_request_date->toDateString(), $userTimezone);

        if ($today->gt($lastRequestDate)) {
            $sessionRequest->request_count = 0;
            $sessionRequest->last_request_date = $today->toDateString();
        }

        if ($sessionRequest->request_count >= $limit) {
            //change status to blocked
            $sessionRequest->status = 'blocked';
            $sessionRequest->save();

            return response()->json(['error' => 'Request limit reached'], 429);
        }

        $sessionRequest->request_count++;
        $sessionRequest->save();

        return $next($request);
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


    public function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return the server IP if the client IP is not found using this method.
    }
}
