<?php

use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Subscribe to the newsletter route
Route::post('/subscribe', [SubscriberController::class, 'store']);

// unsubscribe from the newsletter route
Route::get('/unsubscribe/{email}/{hash}', [SubscriberController::class, 'destroy'])->name('unsubscribe');

// Test email template
Route::get('/mailable', function () {
    $email = App\Models\SendEmail::find(18);
    $subscriber = App\Models\Subscriber::find(11);

    return new App\Mail\Newsletter($email, $subscriber);
});
