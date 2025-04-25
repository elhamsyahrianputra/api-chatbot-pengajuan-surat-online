<?php

use App\Http\Controllers\API\Letter\LetterRequirementController;
use App\Http\Controllers\API\Letter\LetterTypeController;
use App\Http\Controllers\API\Submission\LetterSubmissionController;
use App\Http\Controllers\API\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('letter-types', LetterTypeController::class)
    ->middleware('api');

Route::get('letter-types/slug/{letterType:slug}', [LetterTypeController::class, 'showBySlug'])
    ->middleware('api');

Route::apiResource('letter-requirements', LetterRequirementController::class)
    ->middleware('api');

Route::apiResource('letter-submissions', LetterSubmissionController::class)
    ->middleware('api');

Route::apiResource('users', UserController::class)
    ->middleware('api');

Route::delete('/tes-419', function () {
    Log::info("🔥 Masuk tes route");
    return response()->json(['message' => 'Berhasil masuk tanpa 419']);
});
