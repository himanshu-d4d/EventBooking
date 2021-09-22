<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\apis;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Event\EventBookingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/////Passport Auth Routes///

    Route::post('register', [apis::class, 'register']);
    Route::post('login', [apis::class, 'login'])->middleware('throttle:login');
    Route::get('login', [apis::class, 'login'])->name('login');

//forget password routes//
    Route::post('reset-token', [apis::class, 'resetToken']);
    Route::post('password-reset', [apis::class, 'passwordReset']);

//User Details Routrs//
    Route::group(['middleware' => 'auth:api'], function(){
        
    Route::get('details', [apis::class, 'details']);
    Route::post('update/{id}', [apis::class, 'update']);
    Route::get('logout', [apis::class, 'logout']);
    Route::post('reset-user-password', [apis::class, 'resetPassword']);


    ///////// Event Apis Routes/////////

    Route::post('event-create', [EventController::class, 'EventCreate']);
    Route::post('event-booking', [EventController::class, 'EventBooking']);
    Route::post('event-booking-status', [EventController::class, 'UpdateGuestStatus']);
    //Route::get('event-list', [EventController::class, 'EventList']);
    Route::post('event-update/{id}', [EventController::class, 'EventUpdate']);
    //Route::get('event-delete/{id}', [EventController::class, 'DeleteEvent']);
    Route::get('guest-delete/{id}', [EventController::class, 'DeleteGuest']);
    Route::post('guest-add', [EventController::class, 'AddGuest']);
    Route::post('event-guest-list', [EventController::class, 'EventGuestList']);
    Route::post('myevents', [EventController::class, 'myEventList']);
    Route::post('otheruser-events-list', [EventController::class, 'OtherUserEvents']);
    Route::post('singal-events-list', [EventController::class, 'SingleEvent']);
    Route::get('notification-list', [EventController::class, 'notificationList']);
    Route::get('notification-delete/{id}', [EventController::class, 'DeleteNotification']);
    Route::post('notification-filetr-search', [EventController::class, 'FilterNotification']);
    Route::post('notification-multiplefiletr', [EventController::class, 'FilterNotificationMultiple']);
    Route::get('get-expired-events', [EventController::class, 'getExpiredEvents']);
    Route::get('get-limit-events', [EventController::class, 'GetLimitEvents']);
    Route::post('event-reminder-set', [EventController::class, 'SetReminder']);
    Route::post('user-event-like', [EventController::class, 'EventLike']);
    Route::post('user-event-comment', [EventController::class, 'EventComment']);





}); 
