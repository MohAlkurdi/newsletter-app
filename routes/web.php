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
    $welcome = App\Models\Greeting::find(1)->header;
    $description = App\Models\Greeting::find(1)->description;

    return view('welcome', [
        'welcome' => $welcome,
        'description' => $description,
    ]);
});

// Subscribe to the newsletter route
Route::post('/subscribe', [SubscriberController::class, 'store']);

// unsubscribe from the newsletter route
Route::get('/unsubscribe/{email}/{hash}', [SubscriberController::class, 'destroy'])->name('unsubscribe');

// Test email template
Route::get('/mailable', function () {
    $email = App\Models\SendEmail::find(1);
    $subscriber = App\Models\Subscriber::find(1);

    return new App\Mail\Newsletter($email, $subscriber);
});
