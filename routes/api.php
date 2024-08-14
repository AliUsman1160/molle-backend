<?php
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\EventattendeeController;
use App\Http\Controllers\Api\EventblockController;
use App\Http\Controllers\Api\EventlikeController;
use App\Http\Controllers\Api\EventreportController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\OTPController;  
use App\Http\Controllers\Api\UserBlockController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("register", [UserController::class, "register"]);
Route::post("login", [UserController::class, "login"]);
Route::post('/send-otp', [OTPController::class, 'sendOtp']); 

Route::group(["middleware"=> ["auth:sanctum", "verified"]], function () {
    
    Route::post("check-username", [UserController::class, "checkUsername"]); 
    Route::post("set-username", [UserController::class, "updateUsername"]);  
    Route::get("profile", [UserController::class, "profile"]);
    Route::post("logout", [UserController::class, "logout"]); 
    Route::post("events", [EventController::class, "createEvent"]);
    Route::post('documents', [DocumentController::class, 'store']);
    Route::post('user-blocklists', [UserBlockController::class, 'store']);
    Route::post('follow', [FollowController::class, 'follow']);
    Route::post('event-like', [EventlikeController::class, 'like']);
    Route::post('block-event', [EventblockController::class, 'block']);
    Route::post('attend-event', [EventattendeeController::class, 'attend']);
    Route::post('report-event', [EventreportController::class, 'report']);
});
