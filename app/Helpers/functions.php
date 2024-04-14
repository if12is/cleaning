<?php

//general_settings
if (!function_exists('general_settings')) {
    function general_settings($property)
    {
        return app(\App\Settings\GeneralSettings::class)->$property;
    }
}


//payment_settings
if (!function_exists('payment_settings')) {
    function payment_settings($property)
    {
        return app(\App\Settings\PaymentSettings::class)->$property;
    }
}

//page_settings
if (!function_exists('page_settings')) {
    function page_settings($property)
    {
        return app(\App\Settings\PagesSettings::class)->$property;
    }
}


//get_session_requests_count of all numbers of requests today from session_requests table for all users summation request_count column
if (!function_exists('get_session_requests_count')) {
    function get_session_requests_count()
    {
        return \App\Models\SessionRequest::where('last_request_date', \Carbon\Carbon::today())->sum('request_count');
    }
}

//last_requests give the last request date from session_requests table for 5 users
if (!function_exists('last_requests')) {
    function last_requests()
    {
        return \App\Models\SessionRequest::orderBy('updated_at', 'desc')->take(5)->get();
    }
}


// get_city_name_by_ip
if (!function_exists('get_city_name_by_ip')) {
    function get_city_name_by_ip($ip)
    {
        $geoipDatabasePath = storage_path('app/geoip/GeoLite2-City.mmdb');

        $reader = new \GeoIp2\Database\Reader($geoipDatabasePath);
        try {
            $record = $reader->city($ip);

            return $record->country->name . ' | ' . $record->city->name ?? 'Unknown';
        } catch (\GeoIp2\Exception\AddressNotFoundException $e) {
            return 'Unknown';
        }
    }
}

// git_flag_by_ip
if (!function_exists('get_flag_by_ip')) {
    function get_flag_by_ip($ip)
    {
        $flagApiFromIPURL = file_get_contents("http://ip-api.com/json/$ip");
        $ip_data = json_decode($flagApiFromIPURL, true);
        return $ip_data['countryCode'] ?? 'Unknown';
    }
}


// getPriceDetails
if (!function_exists('getPriceDetails')) {
    function getPriceDetails($priceId)
    {
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Retrieve the price object
            $price = \Stripe\Price::retrieve($priceId);

            // You can now access the price details, for example, the unit amount
            $amount = $price->unit_amount;

            // Convert to a readable format if the amount is in the smallest currency unit (e.g., cents)
            $readableAmount = $amount / 100;

            return $readableAmount;
        } catch (\Exception $e) {
            // Handle error
            return null;
        }
    }
}
