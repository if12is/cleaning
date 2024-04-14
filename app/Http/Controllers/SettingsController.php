<?php

namespace App\Http\Controllers;

use App\Services\SettingService;
use App\Settings\GeneralSettings;
use App\Settings\PagesSettings;
use App\Settings\PaymentSettings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    protected $SettingService;

    public function __construct(SettingService $SettingService)
    {
        $this->SettingService = $SettingService;
    }
    //index
    public function index()
    {
        return view('admin.settings');
    }

    // update general settings
    public function generalUpdate(GeneralSettings $settings, Request $request)
    {
        try {
            $this->SettingService->generalUpdate($settings, $request);
            return response()->json(['status' => 'success', 'message' => 'تم التعديل بنجاح', 'data' => $settings], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['status' => 'error', 'message' => $e->validator->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'حدث خطأ يرجي اعاده المحاولة'], 500);
        }
    }

    // update payment settings
    public function paymentUpdate(PaymentSettings $settings, Request $request)
    {
        try {
            $this->SettingService->paymentUpdate($settings, $request);
            return response()->json(['status' => 'success', 'message' => 'تم التعديل بنجاح'], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['status' => 'error', 'message' => $e->validator->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'حدث خطأ يرجي اعاده المحاولة'], 500);
        }
    }

    // update page settings
    public function pageUpdate(PagesSettings $settings, Request $request)
    {
        try {
            $this->SettingService->pageUpdate($settings, $request);
            return response()->json(['status' => 'success', 'message' => 'تم التعديل بنجاح'], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['status' => 'error', 'message' => $e->validator->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'حدث خطأ يرجي اعاده المحاولة'], 500);
        }
    }
}
