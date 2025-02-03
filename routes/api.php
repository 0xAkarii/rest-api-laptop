<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(Authenticate::using('sanctum'));

//laptops
Route::apiResource('laptop', App\Http\Controllers\Api\LaptopController::class);

Route::fallback(function () {
    return response()->json([
        'success' => false,
        'message' => 'Endpoint not found',
    ], 404);
});