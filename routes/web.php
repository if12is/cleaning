<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ProxyDetectionMiddleware;
use App\Http\Middleware\RateLimitMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Http\Controllers\WebhookController;

Route::get('/terms', function () {
    return view('layouts.front.terms');
});
Route::get('/privacy', function () {
    return view('layouts.front.privacy');
});
Route::get('/contact', function () {
    return view('layouts.front.contact');
});

Route::get('/', [App\Http\Controllers\CommonQuestionsController::class, 'welcome'])->name('welcome');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    // Admin routes
    Route::get('/admin', function () {
        return view('dashboard');
    })->middleware(AdminMiddleware::class)->name('admin');

    //admin/index
    Route::get('/admin/index', function () {
        return view('admin.index');
    })->middleware(AdminMiddleware::class)->name('admin.index');

    //admin/settings
    Route::get('/admin/settings', [
        App\Http\Controllers\SettingsController::class, 'index'
    ])->middleware(AdminMiddleware::class)->name('admin.settings');

    //generalUpdate
    Route::post('/admin/settings/generalUpdate', [
        App\Http\Controllers\SettingsController::class, 'generalUpdate'
    ])->middleware(AdminMiddleware::class)->name('admin.settings.generalUpdate');

    //paymentUpdate
    Route::post('/admin/settings/paymentUpdate', [
        App\Http\Controllers\SettingsController::class, 'paymentUpdate'
    ])->middleware(AdminMiddleware::class)->name('admin.settings.paymentUpdate');

    //pageUpdate
    Route::post('/admin/settings/pageUpdate', [
        App\Http\Controllers\SettingsController::class, 'pageUpdate'
    ])->middleware(AdminMiddleware::class)->name('admin.settings.pageUpdate');

    //index
    Route::get('/admin/subscriptions', [
        App\Http\Controllers\SubscriptionController::class, 'index'
    ])->middleware(AdminMiddleware::class)->name('admin.subscriptions');

    //users
    Route::get('/admin/users', [
        App\Http\Controllers\UserController::class, 'index'
    ])->middleware(AdminMiddleware::class)->name('admin.users');


    //CommonQuestions
    Route::get('/admin/commonQuestions', [
        App\Http\Controllers\CommonQuestionsController::class, 'index'
    ])->middleware(AdminMiddleware::class)->name('admin.commonQuestions');

    //updateCommonQuestions
    Route::post('/admin/commonQuestions/updateCommonQuestions', [
        App\Http\Controllers\CommonQuestionsController::class, 'updateCommonQuestions'
    ])->middleware(AdminMiddleware::class)->name('admin.updateCommonQuestions');
});

Route::middleware(['auth', 'verified', ProxyDetectionMiddleware::class])->group(function () {
    // User routes
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(UserMiddleware::class)->name('dashboard');

    Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
});
Route::post('/stories', [App\Http\Controllers\InstaController::class, 'getAllDataByUsername'])
    ->middleware(RateLimitMiddleware::class)
    ->name('stories');
Route::post('/getreels', [App\Http\Controllers\InstaController::class, 'getReelsByUsername']);
Route::get('/success', [PaymentController::class, 'success'])->name('success');
Route::get('/cancel', [PaymentController::class, 'cancel'])->name('cancel');
Route::any('/stripe/webhook', [PaymentController::class, 'webhook'])->name('stripe.webhook');
Route::post('/get-highlight-stories', [App\Http\Controllers\InstaController::class, 'getHighlightStoriesById'])->name('get-highlight-stories');
Route::post('/saveimage', [App\Http\Controllers\InstaController::class, 'saveimage'])->name('saveimage');

//Pages routes
//Privacy policy
Route::get('/privacy', function () {
    return view('layouts.front.privacy');
})->name('privacy');

//Terms and conditions
Route::get('/terms', function () {
    return view('layouts.front.terms');
})->name('terms');

//Contact us
Route::get('/contact', function () {
    return view('layouts.front.contact');
})->name('contact');

// About us
Route::get('/about', function () {
    return view('layouts.front.about');
})->name('about');

// Auth routes
require __DIR__ . '/auth.php';

//store Contact
Route::post('/contact', [App\Http\Controllers\ContactsController::class, 'store'])->name('contact.store');
