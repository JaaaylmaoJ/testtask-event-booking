<?php

use App\Http\Controllers\Api\V1\ShowController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/show', [ShowController::class, 'get']);
    Route::get('/show/event', [ShowController::class, 'getEvents']);
    Route::get('/show/event/place', [ShowController::class, 'getEventPlaces']);
    Route::post('/show/event/place/book', [ShowController::class, 'bookPlace']);
});
