<?php

use App\Http\Controllers\API\Letter\LetterTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/letter-types', LetterTypeController::class)
    ->middleware('api');
Route::get('/letter-types/slug/{letterType:slug}', [LetterTypeController::class, 'showBySlug'])->middleware('api');

require __DIR__ . '/auth.php';
