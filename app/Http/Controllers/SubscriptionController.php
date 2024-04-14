<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;

class SubscriptionController extends Controller
{
    // index
    public function index()
    {
        $subscriptions = Subscription::with('user')->get();
        return view('admin.subscriptions', compact('subscriptions'));
    }
}
