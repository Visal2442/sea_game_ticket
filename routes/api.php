<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// LOCATION ========================== 
Route::resource("locations", LocationController::class);

// SCHEDULE ========================== 
Route::resource("schedules", ScheduleController::class);

// SPORT ========================== 
Route::resource("sports", SportController::class);

// TEAM ========================== 
Route::resource("teams", TeamController::class);

// EVENT ========================== 
Route::resource("events", EventController::class);
Route::get("events/searchEvent/{event_name}", [EventController::class, "searchEvent"]);
// Route::post("events/bookTicket/{event_id}", [EventController::class, "bookTicket"]);

// BOOKING ========================== 
Route::resource("bookings", BookingController::class);
Route::post("bookings/bookTicket/{event_id}/{zone}", [BookingController::class, "bookTicket"]);
