<?php

namespace App\Services;

use Illuminate\Support\Arr;

class SettingService
{
    public function generalUpdate($settings, $request)
    {
        //validate the request
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);

        //update the settings
        try {
            $settings->fill(Arr::only($validatedData, ['name', 'email', 'description']));
            if ($request->hasFile('logo')) {
                $settings->logo = $this->uploadImage($request->file('logo'));
            } else {
                $settings->logo = $settings->logo;
            }

            if ($request->hasFile('favicon')) {
                $settings->favicon = $this->uploadImage($request->file('favicon'));
            } else {
                $settings->favicon = $settings->favicon;
            }
            $settings->save();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function paymentUpdate($settings, $request)
    {
        //validate the request
        $validatedData = $request->validate([
            'payment_status' => 'required|in:1,0',
            'subscription_value' => 'required|string',
            'request_limit_subscribed_user' => 'required|numeric',
            'request_limit_unsubscribed_user' => 'required|numeric',
            'default_request_limit' => 'required|numeric',
            'Instagram_Api_key' => 'required',
            'Stripe_Api_key' => 'required',
            'Stripe_Secret_key' => 'required',
            'Stripe_webhook_endpoint_url' => 'required',
            'Stripe_webhook_secret' => 'required',
            'Stripe_mode' => 'required|in:test, live',
        ]);

        //update the settings
        try {
            $settings->fill($validatedData);
            $settings->save();

            //update .env file
            $this->updateEnvFile('INSTAGRAM_API_KEY', $validatedData['Instagram_Api_key']);
            $this->updateEnvFile('STRIPE_KEY', $validatedData['Stripe_Api_key']);
            $this->updateEnvFile('STRIPE_SECRET', $validatedData['Stripe_Secret_key']);
            $this->updateEnvFile('STRIPE_WEBHOOK_SECRET', $validatedData['Stripe_webhook_secret']);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function updateEnvFile($key, $value)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        $oldValue = env($key);
        $str = str_replace("{$key}={$oldValue}", "{$key}={$value}", $str);

        $fp = fopen($envFile, 'w');
        fwrite($fp, $str);
        fclose($fp);
    }

    //pageUpdate
    public function pageUpdate($settings, $request)
    {
        // dd($request->all());
        //validate the request
        $validatedData = $request->validate([
            'about_us' => 'required',
            'terms_and_conditions' => 'required',
            'privacy_policy' => 'required',
            'contact_us' => 'required',
        ]);

        // dd($validatedData);

        //update the settings
        try {
            $settings->about_us = $validatedData['about_us'];
            $settings->terms_and_conditions = $validatedData['terms_and_conditions'];
            $settings->privacy_policy = $validatedData['privacy_policy'];
            $settings->contact_us = $validatedData['contact_us'];
            $settings->save();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function uploadImage($image)
    {
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('uploads'), $imageName);
        $path = 'uploads/' . $imageName;
        return $path;
    }
}
